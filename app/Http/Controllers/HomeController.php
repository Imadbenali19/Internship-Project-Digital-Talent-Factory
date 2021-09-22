<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\ContactMail;
use App\Models\Ecole;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user=User::where('admin','=','1')->count();
        if($user==0){
            $newUser=new User();
            $newUser->name="admin";
            $newUser->email="admin@gmail.com";
            $newUser->password=Hash::make("admine");
            $newUser->admin=1;
            $newUser->save();
        }

        $ecole=Ecole::all();
        $specialite=DB::select('select id,NomSpec from specialites');
        $ville=DB::select('select distinct VilleEcole from ecoles');
        $arr=array('ecole'=>$ecole,'specialite'=>$specialite,'ville'=>$ville);

        if(empty(Auth::user()->name) || Auth::user()->admin!=1){
            return view('welcome',$arr);
        }else{
            return redirect('/admin');
        }
        
    }

    public function aboutUS(){
        return view('about');
    }

    public function contactUS(){
        return view('contact');
    }

    public function sendContact(Request $request){
        $details=[
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'subject'=>$request->input('subject'),
            'message'=>$request->input('message')
        ];

        Mail::to('hello@example.com')->send(new ContactMail($details));

        Alert::success('Message envoyé avec succés', '');
        return view('contact');
    }

    public function search1(Request $request){
        $ecoles=Ecole::where('NomEcole','=',$request->input("nomE"))->get();
        $nb=$ecoles->count();
        if($nb!=0){
            Alert::success($nb.' ecole(s) trouvées', '');
            return view('searchSchool',['ecole'=>$ecoles,'nb'=>$nb]);
        }else{
            Alert::error('Aucun résultat trouvé', '');
            return redirect('/');
        }
    }

    public function search2(Request $request){
        $type=$request->input('typeE');
        $ville=$request->input('ville');
        $spec=$request->input('sp');

        $ecoles = DB::table('ecoles')
        ->select('ecoles.NomEcole','ecoles.PhotoEcole','ecoles.TypeEcole','ecoles.id') 
        ->join('specialites_ecoles', 'ecoles.id', '=', 'specialites_ecoles.ecole_id')
        ->join('specialites', 'specialites.id', '=', 'specialites_ecoles.specialite_id')  
        ->where('specialites.id','=',$spec)
        ->orWhere('ecoles.TypeEcole','=',$type)
        ->orWhere('ecoles.VilleEcole','=',$ville)
        ->groupBy('ecoles.NomEcole','ecoles.PhotoEcole','ecoles.TypeEcole','ecoles.id')
        ->get();

        $nb=$ecoles->count();

       if(!empty($ecoles)){
            Alert::success('ecole(s) trouvées', '');
            return view('searchSchool',['ecole'=>$ecoles,'nb'=>$nb]);
        }else{
            Alert::error('Aucun résultat trouvé', '');
            return redirect('/');
        }
    }

}
