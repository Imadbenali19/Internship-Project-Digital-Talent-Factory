<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Ecole;
use App\Models\Etudiant;
use App\Models\Specialite;
use App\Models\Specialite_Ecole;

class userManage extends Controller
{
    public function show($id){
        $ecole=Ecole::find($id);
        return view('show',['ecole'=>$ecole]);
    }

    public function studentTab($id){
        // $data = DB::table('etudiants')
        //     ->select('etudiants.*','specialites.NomSpec') 
        //     ->join('specialites', 'specialites.id', '=', 'etudiants.specialite_id')  
        //     ->where('etudiants.ecole_id','=',$id)
        //     ->get();
        $ecole=Ecole::find($id);
        $data=Etudiant::where('ecole_id','=',$id)->get();
        return view('StudentList',['data'=>$data,'ecole'=>$ecole]);
    }

    public function statistics(Request $request,$id){
        $ecole=Ecole::find($id);
        $nbetudiant=Etudiant::where('ecole_id','=',$id)->count();
        $nbspec=Specialite_Ecole::where('ecole_id','=',$id)->count();

        //Nombre d'étudiants par spécialité
        $post = DB::select('select s.NomSpec,count(*) as nbetd from etudiants et,specialites s where et.ecole_id='.$id.' and et.specialite_id=s.id group by s.NomSpec');
            
        if(empty($post)){
            $data[] = array('y'=>0,'label'=>0); 
        }else{
            foreach($post as $row)
            {
                $data[] = array('y'=>$row->nbetd,'label'=>$row->NomSpec); 
            }
        }

        //Nombre d'étudiants par niveau scolaire
        // $post = DB::table('etudiants')
        // ->select('etudiants.NiveauEtud AS NiveauEtud')
        // ->where('etudiants.ecole_id','=',$id)
        // ->groupBy('etudiants.NiveauEtud')
        // ->get()
        // ->toArray();
        
        $post1 = DB::select('select NiveauEtud as N,count(*) as nbetd from etudiants et where et.ecole_id='.$id.' group by NiveauEtud');
            
        if(empty($post1)){
            $data1[] = array('y'=>0,'label'=>0); 
        }else{
            foreach($post1 as $row1)
            {
                $data1[] = array('y'=>$row1->nbetd,'label'=>$row1->N); 
            }
        }


        $post2 = DB::select('select AnneeDeGraduationEtud as AG,count(*) as nbetd from etudiants et where et.ecole_id='.$id.' group by AnneeDeGraduationEtud');
            
        if(empty($post2)){
            $data2[] = array('y'=>0,'label'=>0); 
        }else{
            foreach($post2 as $row2)
            {
                $data2[] = array('y'=>$row2->nbetd,'label'=>$row2->AG); 
            }
        }

        $year=DB::select('select distinct AnneeDeGraduationEtud as AG from etudiants where ecole_id='.$id);

        $y=$request->input('year');
        if(!isset($y)){
            if(empty($year))
                $y=0;
            else
                $y=$year[0]->AG;
        }
            
        
            
        $post3 = DB::select('select s.NomSpec,count(*) as nbetd from etudiants et,specialites s where et.ecole_id='.$id.' and et.specialite_id=s.id and AnneeDeGraduationEtud='.$y.' group by s.NomSpec');
            
        if(empty($post3)){
            $data3[] = array('y'=>0,'label'=>0); 
        }else{
            foreach($post3 as $row3)
            {
                $data3[] = array('y'=>$row3->nbetd,'label'=>$row3->NomSpec); 
            }
        }

        



        return view('statistiques',['ecole'=>$ecole,'nbetudiant'=>$nbetudiant,'nbspec'=>$nbspec,'data' => $data,'data1' => $data1,'data2' => $data2,'data3' => $data3,'year'=>$year,'y'=>$y]);
    }
}
