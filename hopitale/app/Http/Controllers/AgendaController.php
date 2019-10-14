<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AgendaController extends Controller
{
    //methode pour afficher les rendez-vous
    public function index(){

        if (Auth::guest())
            return redirect('/');
        
        if(Auth::user()->utilisateur == "Patient")
            return redirect('Agenda');

      else{
            
            $d=strtotime("-2 Months"); 
            $M=date("Y-m-d",$d); 

            DB::table('hospitalisations')->where('rendez_vous', '<', $M)->delete();
            DB::table('examens')->where('rendez_vous', '<', $M)->delete();

            $date=date("Y-m-d");

    	$examens =  DB::table('patients')
            ->join('examens', 'patients.id', '=', 'examens.patient_id')
            ->select('examens.*','patients.id as exId','patients.nom as name','patients.prenom')
            ->where([['examens.rendez_vous','<>',null],['examens.rendez_vous','>=',$date],])
            ->orderBy('rendez_vous', 'asc')->get();
        $hospitalisations =  DB::table('patients')
            ->join('hospitalisations', 'patients.id', '=', 'hospitalisations.patient_id')
            ->select('hospitalisations.*','hospitalisations.id as hospId','patients.nom as name','patients.prenom')
            ->where([['hospitalisations.rendez_vous','<>',null],['hospitalisations.rendez_vous','>=',$date],])
            ->orderBy('rendez_vous', 'asc')->get();

            $chambres=DB::table('chambres')->select('numChambre')->orderBy('numChambre', 'asc')->distinct()->get();
            $services=DB::table('chambres')->select('service')->orderBy('service', 'asc')->distinct()->get();
            $lits = DB::table('lits')->orderBy('numLit', 'asc')->distinct()->get();
        return view('rendezVous.rendez',['examens'=>$examens,'hospitalisations'=>$hospitalisations,'date'=>$date,'chambres'=>$chambres,'services'=>$services,'lits'=>$lits]);

        }

    }

    //adenda de patient 
    public function agenda(){

        if (Auth::guest())
            return redirect('/');
        
        if(Auth::user()->utilisateur != "Patient")
            return redirect('home');

        $examens =  DB::table('examens')
            ->where('patient_id','=',Auth::user()->id)
            ->orderBy('rendez_vous','created_at', 'asc')->get();

        $hospitalisations =  DB::table('hospitalisations')
            ->where('patient_id','=',Auth::user()->id)
            ->orderBy('rendez_vous','created_at', 'asc')->get();
       
//print_r($rendez_vous);
        return view('agenda',['examens'=>$examens,'hospitalisations'=>$hospitalisations]);

    }

    //fonction pour valider le passement de rendez-vous
    public function valider(Request $request,$MotCle,$id){

        if (Auth::guest())
            return redirect('/');
        
    	if($MotCle == "Hospitalisation"){
            DB::table('hospitalisations')->where('id','=',$id)->update(array('rendez_vous'=>null));
    	} else{
            DB::table('examens')->where('id','=',$id)->update(array('rendez_vous'=>null));
        }
          return redirect('Rendez-vous');

    }

    //fonction pour  suuprimer le rendez-vous
    public function delete(Request $request,$MotCle,$id){

        if (Auth::guest())
            return redirect('/');
        
    	if($MotCle == "Hospitalisation"){
            DB::table('hospitalisations')->where('id', '=', $id)->delete();
    	} else{
            DB::table('examens')->where('id', '=', $id)->delete();
        }
          return redirect('Rendez-vous');
    }

    //fonction pour valider le passement de rendez-vous
    public function update(Request $request,$MotCle,$id){

        if (Auth::guest())
            return redirect('/');
        
    	if($MotCle == "Hospitalisation"){
            DB::table('hospitalisations')->where('id','=',$id)->update(array('lit_num'=>$request['lit'],'chambre_num'=>$request['numCh'],'rendez_vous'=>$request['debut'],'debut'=>$request['debut'],'fin'=>$request['fin'],'service'=>$request['service']));
    	} else{
            DB::table('examens')->where('id','=',$id)->update(array('rendez_vous'=>$request['date']));
        }
          return redirect('Rendez-vous');
    	
    }

}
