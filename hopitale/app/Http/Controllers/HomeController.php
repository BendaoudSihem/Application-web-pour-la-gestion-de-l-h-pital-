<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Consultation;
use App\Hospitalisation;
use App\Examen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if (Auth::guest())
            return view('auth.login');
        else if(Auth::user()->utilisateur != "Patient")
           return view('home');
        
        else


      $patient= DB::table('patients')->where('IdUser','=',Auth::user()->id)->first();
      $consultations= Consultation::where('patient_id','=',$patient->id)->orderBy('created_at')->skip(0)->take(5)->get();
      $consults=Consultation::where('patient_id','=',$patient->id)
         ->orderBy('created_at', 'desc')->get();
      $cntCon= Consultation::where('patient_id','=',$patient->id)->count();
      $examens= Examen::where('patient_id','=',$patient->id)
      ->skip(0)->take(5)->get();
      $exams= Examen::where('patient_id','=',$patient->id)
          ->orderBy('created_at', 'desc')->get();
      $cntEx= Examen::where('patient_id','=',$patient->id)->count();
      $hospitalisations= Hospitalisation::where('patient_id','=',$patient->id)
      ->skip(0)->take(5)->get();
      $hospits= Hospitalisation::where('patient_id','=',$patient->id)
        ->orderBy('created_at', 'desc')->get();
      $cntHos= Hospitalisation::where('patient_id','=',$patient->id)->count();
             
           return view('patient',['patient'=>$patient,'examens'=>$examens,'hospitalisations'=>$hospitalisations,'consultations'=>$consultations,'exams'=>$exams,'hospits'=>$hospits,'consults'=>$consults,'prev'=>(-1),'next'=>1,'cntCon'=>$cntCon,'pr'=>(-1),'nxt'=>1,'cntEx'=>$cntEx,'prec'=>(-1),'suiv'=>1,'cntHos'=>$cntHos]);
      
    }

    //methode pour afficher le profile d'un patient
     public function view(Request $request){

        if (Auth::guest())
            return redirect('/');
          
      //inisialise les valeurs quand arrive avec le GET
        $valu=0;
        $prev=-1;
        $next=1;
        $valu1=0;
        $pr=-1;
        $nxt=1;
        $valu2=0;
        $prec=-1;
        $suiv=1;

       // calculer precedent et suivant dans le post
      if($request['prev']!=null){
        $valu=$request['prev'];
        $prev=$request['prev']-1;
        $next=$request['prev']+1;
      }elseif($request['next']!=null){
        $valu=$request['next'];
        $prev=$request['next']-1;
        $next=$request['next']+1;
      }elseif($request['pr']!=null){
        $valu1=$request['pr'];
        $prev=$request['pr']-1;
        $next=$request['pr']+1;
      }elseif($request['nxt']!=null){
        $valu1=$request['nxt'];
        $prev=$request['nxt']-1;
        $next=$request['nxt']+1;
      }elseif($request['prec']!=null){
        $valu2=$request['prec'];
        $prev=$request['prec']-1;
        $next=$request['prec']+1;
      }elseif($request['suiv']!=null){
        $valu2=$request['suiv'];
        $prev=$request['suiv']-1;
        $next=$request['suiv']+1;
      }

      $patient= DB::table('patients')->where('IdUser','=',Auth::user()->id)->first();
      $consultations= Consultation::where('patient_id','=',$patient->id)->orderBy('created_at')->skip(5*$valu)->take(5)->get();
      $consults=Consultation::where('patient_id','=',$patient->id)->orderBy('created_at', 'desc')->get();
      $cntCon= Consultation::where('patient_id','=',$patient->id)->count();
      $examens= Examen::where('patient_id','=',$patient->id)
      ->skip(5*$valu1)->take(5)->get();
      $exams= Examen::where('patient_id','=',$patient->id)
          ->orderBy('created_at', 'desc')->get();
      $cntEx= Examen::where('patient_id','=',$patient->id)->count();
      $hospitalisations= Hospitalisation::where('patient_id','=',$patient->id)
      ->skip(5*$valu2)->take(5)->get();
      $hospits= Hospitalisation::where('patient_id','=',$patient->id)
        ->orderBy('created_at', 'desc')->get();
      $cntHos= Hospitalisation::where('patient_id','=',$patient->id)->count();
      
      $cntCon /=5;
      $cntEx/=5;
      $cntHos/=5;
             
           return view('patient',['patient'=>$patient,'examens'=>$examens,'hospitalisations'=>$hospitalisations,'consultations'=>$consultations,'exams'=>$exams,'hospits'=>$hospits,'consults'=>$consults,'prev'=>$prev,'next'=>$next,'cntCon'=>$cntCon,'pr'=>$pr,'nxt'=>$nxt,'cntEx'=>$cntEx,'prec'=>$prec,'suiv'=>$suiv,'cntHos'=>$cntHos]);

     }

    public function profile(){

        if (Auth::guest())
            return redirect('/');
        

         if(Auth::user()->utilisateur == "Patient")
                    $this->authorize('view');
        if(Auth::user()->utilisateur == "Medecin")
            $personne = DB::table('medecins')->where('IdUser','=',Auth::user()->id)
                 ->first();
        if(Auth::user()->utilisateur == "Infermier")
            $personne = DB::table('infermiers')->where('IdUser','=',Auth::user()->id)
                 ->first();
        if(Auth::user()->utilisateur == "Secretaire")
            $personne = DB::table('secretaires')->where('IdUser','=',Auth::user()->id)
                 ->first();
         
            return view('profile',['personne'=>$personne]);

    }



    public function update(Request $request){

        if (Auth::guest())
            return redirect('/');

            $this->Validate($request,['psw' => 'string|min:6',]);
         
            DB::table('users')->where('id','=',Auth::user()->id)->update(array('password'=>bcrypt($request['nv'])));
          
          if(Auth::user()->utilisateur == "Patient")
               return redirect('home');

         
            return redirect('Profile');

    }

    public function contact(Request $request){

        if (Auth::guest())
            return redirect('/');
          
         
            return view('contact');

    }

    public function aide(Request $request){

        if (Auth::guest())
            return redirect('/');
          
         
            return view('aide');

    }

    public function urgence(Request $request){

        if (Auth::guest())
            return redirect('/');
          
         
            return view('urgence');

    }
}
