<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Ecole;
use App\Models\Etudiant;
use App\Models\Specialite;
use App\Models\Specialite_Ecole;

class adminManage extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->admin==1){
            
            $nbusers=User::where('admin','=','0')->count();
            $nbecole=Ecole::all()->count();
            $nbetudiant=Etudiant::all()->count();
            $nbspec=Specialite::all()->count();

            // $post = DB::table('etudiants')->get()->toArray();
            $post = DB::select('select e.NomEcole,count(*) as nbetd from etudiants et,ecoles e where et.ecole_id=e.id group by e.NomEcole');
            
            if(empty($post)){
                $data[] = array('y'=>0,'label'=>0); 
            }else{
                foreach($post as $row)
                {
                    $data[] = array('y'=>$row->nbetd,'label'=>$row->NomEcole); 
                }
            }
            
            return view('admin.index',['nbu'=>$nbusers,'nbe'=>$nbecole,'nbetd'=>$nbetudiant,'nbspec'=>$nbspec,'data' => $data]);
        
        }else {
            return redirect('/');
        }
    }

    //USER
    public function userList(){
        if(Auth::user()->admin==1){

            $data=User::all();
            return view('admin.userList',['data'=>$data]);

        }else {
            return redirect('/');
        }
    }

    public function addUser(Request $request){
        if(Auth::user()->admin==1){

            if($request->isMethod('post')){
                $this->validate($request,[
                    'email' => 'required|unique:users',
                ]);

                $newUser=new User();
                $newUser->name=$request->input('name');
                $newUser->email=$request->input('email');
                $newUser->password=Hash::make($request->input('password'));
                $newUser->admin=0;
                $newUser->save();
                Alert::success('User added successfully', '');
            }
            return view('admin.addUser'); 

        }else{
            return redirect('/');
        }
    }
    
    public function deleteUser($id){
        if(Auth::user()->admin==1){

            $data=User::find($id);
            $data->delete();
            Alert::success('User deleted successfully', '');
            return redirect('/usersList');

        }else {
            return redirect('/');
        }
    }

    public function updateUser(Request $request,$id){
        if(Auth::user()->admin==1){

            if($request->isMethod('post')){
                $data=User::find($id);
                $this->validate($request,[
                    'email' => "required|unique:users,email,$id",
                ]);
                $data->name=$request->input('name');
                $data->email=$request->input('email');
                $data->password=Hash::make($request->input('password'));
                
                $data->save();
                Alert::success('User updated successfully', '');
                return redirect('/usersList');
            }else{
                $data=User::find($id);
                $arr=array('data'=>$data); 
                return view('admin.addUser',$arr);
            }

        }else {
            return redirect('/');
        }
        
    }

//////////////////////////////////////////////

    //SCHOOL
    public function schoolList(){
        if(Auth::user()->admin==1){

            $data=Ecole::all();
            return view('admin.schoolList',['data'=>$data]);

        }else {
            return redirect('/');
        }
    }

    public function addSchool(Request $request){
        if(Auth::user()->admin==1){

            $specialite=DB::select('select id,NomSpec from specialites');
            $ecole=DB::select('select VilleEcole from ecoles');

            if($request->isMethod('post')){

                $this->validate($request,[
                    'EmailEcole' => 'unique:ecoles',
                    'NomEcole' => 'required|unique:ecoles',
                    'AdresseEcole' => 'required|unique:ecoles',
                    'DateFondationEcole' => 'required',
                    'VilleEcole' => 'required',
                    'TelEcole' => 'required|unique:ecoles',
                    'SiteWebEcole' => 'unique:ecoles',
                ]);

                $newSchool=new Ecole();

                $newSchool->NomEcole=$request->input('NomEcole');
                $newSchool->TypeEcole=$request->input('TypeEcole');
                $newSchool->AdresseEcole=$request->input('AdresseEcole');
                $newSchool->DateFondationEcole=$request->input('DateFondationEcole');
                $newSchool->VilleEcole=$request->input('VilleEcole');
                $newSchool->EmailEcole=$request->input('EmailEcole');
                $newSchool->TelEcole=$request->input('TelEcole');
                $newSchool->LinkedInEcole=$request->input('LinkedInEcole');
                $newSchool->SiteWebEcole=$request->input('SiteWebEcole');
                $newSchool->HistoireEcole=$request->input('HistoireEcole');

                if($request->has('customFile')){
                    $file=$request->customFile;
                    $extension=$file->getClientOriginalExtension();
                    $filename=$newSchool->NomEcole.'_'.time().'.'.$extension;
                    $file->move('Images/Ecoles/',$filename);
                    $newSchool->PhotoEcole=$filename;
                }

                $x=$request->input('spec');

                $newSchool->save();
                foreach($x as $listvalue){
                    $newthing=new Specialite_Ecole();
                    $newthing->ecole_id=$newSchool->id;
                    $newthing->specialite_id=$listvalue;
                    $newthing->save();
                }
                Alert::success('School/Univ added successfully', '');
            }
            return view('admin.addSchool',['specialites'=>$specialite,'ecole'=>$ecole]);

        }else{
            return redirect('/');
        } 
    }
    
    public function deleteSchool($id){
        if(Auth::user()->admin==1){

            $data=Ecole::find($id);
            if(isset($data->PhotoEcole))
                unlink('Images/Ecoles/'.$data->PhotoEcole);
            $data->delete();
            Alert::success('School/Univ deleted successfully', '');
            return redirect('/schoolsList');

        }else{
            return redirect('/');
        }
    }

    public function updateSchool(Request $request,$id){
        if(Auth::user()->admin==1){

            if($request->isMethod('post')){
                $data=Ecole::find($id);
                $this->validate($request,[
                    'NomEcole' => "required|unique:ecoles,NomEcole,$id",
                    'EmailEcole' => "unique:ecoles,EmailEcole,$id",
                    'AdresseEcole' => "required|unique:ecoles,AdresseEcole,$id",
                    'TelEcole' => "required|unique:ecoles,TelEcole,$id",
                    'SiteWebEcole' => "unique:ecoles,SiteWebEcole,$id",
                ]);

                $data->NomEcole=$request->input('NomEcole');
                $data->TypeEcole=$request->input('TypeEcole');
                $data->AdresseEcole=$request->input('AdresseEcole');
                $data->DateFondationEcole=$request->input('DateFondationEcole');
                $data->VilleEcole=$request->input('VilleEcole');
                $data->EmailEcole=$request->input('EmailEcole');
                $data->TelEcole=$request->input('TelEcole');
                $data->LinkedInEcole=$request->input('LinkedInEcole');
                $data->SiteWebEcole=$request->input('SiteWebEcole');
                $data->HistoireEcole=$request->input('HistoireEcole');
                
                if($request->has('customFile')){
                    $file=$request->customFile;
                    $extension=$file->getClientOriginalExtension();
                    $filename=$data->NomEcole.'_'.time().'.'.$extension;
                    $file->move('Images/Ecoles/',$filename);
                    unlink('Images/Ecoles/'.$data->PhotoEcole);
                    $data->PhotoEcole=$filename;
                }
                
                $x=$request->input('spec');

                DB::delete('delete from specialites_ecoles where ecole_id='.$data->id);

                foreach($x as $listvalue){
                    $newthing=new Specialite_Ecole();
                    $newthing->ecole_id=$data->id;
                    $newthing->specialite_id=$listvalue;
                    $newthing->save();
                }
                
                $data->save();

                Alert::success('School/Univ updated successfully', '');
                return redirect('/schoolsList');
            }else{
                $specialite=DB::select('select id,NomSpec from specialites');
                $ecole=DB::select('select VilleEcole from ecoles');
                $data=Ecole::find($id);
                $data2=DB::select('select specialite_id from specialites_ecoles where ecole_id='.$id);
                $arr=array('data'=>$data,'data2'=>$data2,'specialites'=>$specialite,'ecole'=>$ecole); 
                return view('admin.addSchool',$arr);
            }

        }else{
            return redirect('/');
        }

    }

//////////////////////////////////////////////

    //STUDENT
    public function studentList(){
        if(Auth::user()->admin==1){

            $data=Etudiant::all();
            // echo $data[0]->ecole->NomEcole;echo "<br>";
            // echo $data[0]->NomEtud;
            return view('admin.studentList',['data'=>$data]);

        }else{
            return redirect('/');
        }
    }

    public function addStudent(Request $request){
        if(Auth::user()->admin==1){

            $ecole_spec=DB::select('select s.NomSpec,e.NomEcole,se.specialite_id,se.ecole_id from specialites_ecoles se,specialites s,ecoles e where e.id=se.ecole_id and s.id=se.specialite_id order by e.NomEcole asc');

            if($request->isMethod('post')){

                $this->validate($request,[
                    'EmailEtud' => 'unique:etudiants',
                    'NomEtud' => 'required|unique:etudiants',
                    'PrenomEtud' => 'required|unique:etudiants',
                    'DateNaissEtud' => 'required',
                    'AnneeDeGraduationEtud' => 'required',
                    'TelEtud' => 'required|unique:etudiants',
                    'LinkedInEtud' => 'unique:etudiants',
                ]);

                $newStudent=new Etudiant();

                $newStudent->NomEtud=$request->input('NomEtud');
                $newStudent->PrenomEtud=$request->input('PrenomEtud');
                $newStudent->NiveauEtud=$request->input('NiveauEtud');
//////////////////////////////////////
                $string=$request->input('EcoleSpecEtud');
                $ID=explode(":", $string);
            
                

                $y=DB::table('ecoles')->select('ecoles.id AS id')->where('NomEcole','=',$ID[0])->get()->toArray();
                $z=DB::table('specialites')->select('specialites.id AS id')->where('NomSpec','=',$ID[1])->get()->toArray();
             
                 
                $newStudent->ecole_id=$y[0]->id;
                $newStudent->specialite_id=$z[0]->id;

// ////////////////////////////////////////////
                $newStudent->DateNaissEtud=$request->input('DateNaissEtud');
                $newStudent->EmailEtud=$request->input('EmailEtud');
                $newStudent->TelEtud=$request->input('TelEtud');
                $newStudent->LinkedInEtud=$request->input('LinkedInEtud');
                $newStudent->AnneeDeGraduationEtud=$request->input('AnneeDeGraduationEtud');
                
                $dateValue=date("y");
                $dataG=$newStudent->AnneeDeGraduationEtud;
                if($dataG>$dateValue){
                    $newStudent->IsGradueEtud=0;
                }else{
                    $newStudent->IsGradueEtud=1;
                }

                $date1 = date("y-m-d"); 

                $date2 = $newStudent->DateNaissEtud;
                $dateDifference = abs(strtotime($date2) - strtotime($date1));
                $years  = floor($dateDifference / (365 * 60 * 60 * 24));
                $newStudent->AgeEtud=$years;


                if($request->has('customFile')){
                    $file=$request->customFile;
                    $extension=$file->getClientOriginalExtension();
                    $filename=$newStudent->NomEtud.'&'.$newStudent->PrenomEtud.'_'.time().'.'.$extension;
                    $file->move('Images/Etudiants/',$filename);
                    $newStudent->PhotoEtud=$filename;
                }

                $newStudent->save();
                
                Alert::success('Student added successfully', '');
            }
            return view('admin.addStudent',['ecole_spec'=>$ecole_spec]); 

        }else{
            return redirect('/');
        }
    }
    
    public function deleteStudent($id){
        if(Auth::user()->admin==1){

            $data=Etudiant::find($id);
            if(isset($data->PhotoEtud))
                unlink('Images/Etudiants/'.$data->PhotoEtud);
            $data->delete();
            Alert::success('Student deleted successfully', '');
            return redirect('/studentsList');

        }else{
            return redirect('/');
        }
    }

    public function updateStudent(Request $request,$id){
        if(Auth::user()->admin==1){

            $ecole_spec=DB::select('select s.NomSpec,e.NomEcole,se.specialite_id,se.ecole_id from specialites_ecoles se,specialites s,ecoles e where e.id=se.ecole_id and s.id=se.specialite_id order by e.NomEcole asc');
            if($request->isMethod('post')){
                
                $data=Etudiant::find($id);

                $this->validate($request,[
                    'EmailEtud' => "unique:etudiants,EmailEtud,$id",
                    'NomEtud' => "required|unique:etudiants,NomEtud,$id",
                    'PrenomEtud' => "required|unique:etudiants,PrenomEtud,$id",
                    'DateNaissEtud' => "required",
                    'TelEtud' => "required|unique:etudiants,TelEtud,$id",
                    'LinkedInEtud' => "unique:etudiants,LinkedInEtud,$id",
                ]);

                $data->NomEtud=$request->input('NomEtud');
                $data->PrenomEtud=$request->input('PrenomEtud');
                $data->NiveauEtud=$request->input('NiveauEtud');
// ///////////////////////////
                $string=$request->input('EcoleSpecEtud');
                $ID=explode(":", $string);
            
                $y=DB::table('ecoles')->select('ecoles.id AS id')->where('NomEcole','=',$ID[0])->get()->toArray();
                $z=DB::table('specialites')->select('specialites.id AS id')->where('NomSpec','=',$ID[1])->get()->toArray();
             
                 
                $data->ecole_id=$y[0]->id;
                $data->specialite_id=$z[0]->id;
//////////////////////////////

                $data->DateNaissEtud=$request->input('DateNaissEtud');
                $data->EmailEtud=$request->input('EmailEtud');
                $data->TelEtud=$request->input('TelEtud');
                $data->LinkedInEtud=$request->input('LinkedInEtud');
                $data->AnneeDeGraduationEtud=$request->input('AnneeDeGraduationEtud');
                $dateValue=date("Y");
                $dataG=$data->AnneeDeGraduationEtud;
                if($dataG>$dateValue){
                    $data->IsGradueEtud=0;
                }else{
                    $data->IsGradueEtud=1;
                }
                // echo $dateValue.'\n'; 
                // echo $dataG.'\n'; 

                $date1 = date("y-m-d"); 

                $date2 = $data->DateNaissEtud;
                $dateDifference = abs(strtotime($date2) - strtotime($date1));
                $years  = floor($dateDifference / (365 * 60 * 60 * 24));
                $data->AgeEtud=$years;


                if($request->has('customFile')){
                    $file=$request->customFile;
                    $extension=$file->getClientOriginalExtension();
                    $filename=$data->NomEtud.'&'.$data->PrenomEtud.'_'.time().'.'.$extension;
                    $file->move('Images/Etudiants/',$filename);
                    unlink('Images/Etudiants/'.$data->PhotoEtud);
                    $data->PhotoEtud=$filename;
                }

                $data->save();

                Alert::success('Student updated successfully', '');
                return redirect('/studentsList');
            }else{
                $data=Etudiant::find($id);
                $arr=array('data'=>$data,'ecole_spec'=>$ecole_spec); 

                $MY_ecole_Name=DB::table('ecoles')->select('ecoles.NomEcole AS NomEcole')->where('id','=',$data->ecole_id)->get()->toArray();
                $MY_spec_Name=DB::table('specialites')->select('specialites.NomSpec AS NomSpec')->where('id','=',$data->specialite_id)->get()->toArray();
                
                $arr['MY_ecole_Name']=$MY_ecole_Name[0]->NomEcole;
                $arr['MY_spec_Name']=$MY_spec_Name[0]->NomSpec;
                
                return view('admin.addStudent',$arr);
            }

        }else{
            return redirect('/');
        }

    }

////////////////////////////////////////////////////

    //SPECIALITE
    public function specialiteList(){
        if(Auth::user()->admin==1){

            $data=Specialite::all();
            return view('admin.specialiteList',['data'=>$data]);

        }else{
            return redirect('/');
        }
    }

    public function addSpecialite(Request $request){
        if(Auth::user()->admin==1){

            if($request->isMethod('post')){
                $this->validate($request,[
                    'NomSpec' => 'required|unique:specialites',
                ]);

                $newSpecialite=new Specialite();

                $newSpecialite->NomSpec=$request->input('NomSpec');
                $newSpecialite->DescriptionSpec=$request->input('DescriptionSpec');
            
                $newSpecialite->save();
                Alert::success('Specialite added successfully', '');
            }
            return view('admin.addSpecialite'); 

        }else{
            return redirect('/');
        }
    }
    
    public function deleteSpecialite($id){
        if(Auth::user()->admin==1){

            $data=Specialite::find($id);
            $data->delete();
            Alert::success('Specialite deleted successfully', '');
            return redirect('/specialitiesList');

        }else{
            return redirect('/');
        }
    }

    public function updateSpecialite(Request $request,$id){
        if(Auth::user()->admin==1){

            if($request->isMethod('post')){
                $data=Specialite::find($id);

                $this->validate($request,[
                    'NomSpec' => "required|unique:specialites,NomSpec,$id",
                ]);

                $data->NomSpec=$request->input('NomSpec');
                $data->DescriptionSpec=$request->input('DescriptionSpec');
                
                $data->save();

                Alert::success('Specialite updated successfully', '');
                return redirect('/specialitiesList');
            }else{
                $data=Specialite::find($id);
                $arr=array('data'=>$data); 
                return view('admin.addSpecialite',$arr);
            }

        }else{
            return redirect('/');
        }

    }
}