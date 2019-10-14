<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Consultation;
use App\Examen;
use App\Hospitalisation;
use App\Medecin;
use App\Patient;
use App\Secretaire;
use App\Ordonnance;
use App\Rapport;
use App\LettreDOrientation;
use App\User;
use App\Infermier;
use Auth;
class ArchiveController extends Controller
{
    //methode d'afficharge
    public function index($MotCle,$id){

        if (Auth::guest())
            return redirect('/');
          
              
         if(Auth::user()->utilisateur == "Patient")
        $this->authorize('view');

        $archive=DB::table($MotCle)->where('archive','=','oui')->skip(6*$id)->take(6)->get();
        $cmp =DB::table($MotCle)->where('archive','=','oui')->count();
        $cmp/=6;
        if($MotCle=="patients")
         return view('archives.affichepatient',['patients'=>$archive,'cmp'=>$cmp,'MotCle'=>$MotCle]);
        elseif($MotCle=="secretaires")
         return view('archives.affichesecretaire',['secretaires'=>$archive,'cmp'=>$cmp,'MotCle'=>$MotCle]);
        else
         return view('archives.afficheMedecinInfermier',['archives'=>$archive,'cmp'=>$cmp,'MotCle'=>$MotCle]);
        

    }

    //methode pour afficher les rendez-vous passé
    public function agenda(){

        if (Auth::guest())
            return redirect('/');
        
        if(Auth::user()->utilisateur == "Patient")
            return redirect('Agenda');

      else{

        $date=date("Y-m-d");

      $examens =  DB::table('patients')
            ->join('examens', 'patients.id', '=', 'examens.patient_id')
            ->select('examens.*','patients.id as exId','patients.nom as name','patients.prenom')
            ->where([['examens.rendez_vous','<>',null],['examens.rendez_vous','<',$date],])
            ->orderBy('rendez_vous', 'desc')->get();
        $hospitalisations =  DB::table('patients')
            ->join('hospitalisations', 'patients.id', '=', 'hospitalisations.patient_id')
            ->select('hospitalisations.*','hospitalisations.id as hospId','patients.nom as name','patients.prenom')
            ->where([['hospitalisations.rendez_vous','<>',null],['hospitalisations.rendez_vous','<',$date],])
            ->orderBy('rendez_vous', 'desc')->get();
            
            $chambres=DB::table('chambres')->select('numChambre')->orderBy('numChambre', 'asc')->distinct()->get();
            $services=DB::table('chambres')->select('service')->orderBy('service', 'asc')->distinct()->get();
            $lits = DB::table('lits')->orderBy('numLit', 'asc')->distinct()->get();

        return view('rendezVous.rendez',['examens'=>$examens,'hospitalisations'=>$hospitalisations,'date'=>$date,'chambres'=>$chambres,'services'=>$services,'lits'=>$lits]);

        }

    }


    public function rechercher(Request $request,$MotCle){

      $item =$request['rechercher'];
      if ($MotCle=="patients") {
        
      $data= DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['NumSecurite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['taille','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['poid','LIKE','%'.$item.'%'],])
            ->skip(0)->take(6)->get();
      
      $cmp =DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['NumSecurite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['taille','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['poid','LIKE','%'.$item.'%'],])
            ->count();
      }elseif ($MotCle=="secretaires") {
        
      $data= DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%']])

            ->skip(0)->take(6)->get();
      
      $cmp =DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%']])
            ->count();
      }else{
      $data= DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['grade','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['specialite','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%']])
            ->skip(0)->take(6)->get();
      
      $cmp =DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['grade','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['specialite','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%']])
            ->count();

      }
      $cmp/=6;

         if($MotCle=="patients")
            return view('archives.recherchepatient',['patients'=>$data,'cmp'=>$cmp,'motCle'=>$item,'MotCle'=>$MotCle]);

           elseif($MotCle=="secretaires")
             return view('archives.rechercheSecretaire',['secretaires'=>$data,'cmp'=>$cmp,'motCle'=>$item,'MotCle'=>$MotCle]);

          else
            return view('archives.recherecheMedInf',['archives'=>$data,'cmp'=>$cmp,'motCle'=>$item,'MotCle'=>$MotCle]);
    }

     public function rechercher1($MotCle,$motCle,$id){

        if (Auth::guest())
            return redirect('/');
          

          $item=$motCle;
      if ($MotCle=="patients") {
        
      $data= DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['taille','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['poid','LIKE','%'.$item.'%'],])
            ->skip(6*$id)->take(6)->get();
      
      $cmp =DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['taille','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','oui'],['poid','LIKE','%'.$item.'%'],])
            ->count();
      }elseif ($MotCle=="secretaires") {
        
      $data= DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%']])

            ->skip(6*$id)->take(6)->get();
      
      $cmp =DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%']])
            ->count();
      }else{
      $data= DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['grade','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['specialite','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%']])
            ->skip(6*$id)->take(6)->get();
      
      $cmp =DB::table($MotCle)->where([['archive','=','oui'],['nom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['prenom','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['adresse','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['sexe','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['song','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['email','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['grade','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['specialite','LIKE','%'.$item.'%']])
            ->orwhere([['archive','=','oui'],['tlf','LIKE','%'.$item.'%']])
            ->count();

      }
      $cmp/=6;

            if($MotCle=="patients")
            return view('archives.recherchepatient',['patients'=>$data,'cmp'=>$cmp,'motCle'=>$item,'MotCle'=>$MotCle]);

            elseif($MotCle=="secretaires")
             return view('archives.recherchesecretaire',['secretaires'=>$data,'cmp'=>$cmp,'motCle'=>$item,'MotCle'=>$MotCle]);

            else
            return view('archives.rechercheMedInf',['archives'=>$data,'cmp'=>$cmp,'motCle'=>$item,'MotCle'=>$MotCle]);
    }

    public function restaurer(Request $request,$MotCle,$id){

        if (Auth::guest())
            return redirect('/');
          
            
         if(Auth::user()->utilisateur == "Patient"){
            if($MotCle == "patients")  $this->authorize('patient');
            else $this->authorize('restaurer');
                    }
      $this->Validate($request,['psw' => 'string|min:6',]);

      if($MotCle == "patients"){
        $data=Patient::find($id);
        $utilisateur="Patient";
      }
      elseif($MotCle == "secretaires"){
        $data=Secretaire::find($id);
        $utilisateur="Secretaire";
      }
      elseif($MotCle == "medecins"){
        $data=Medecin::find($id);
        $utilisateur="Medecin";
      }
      else{
        $data=Infermier::find($id);
        $utilisateur="Infermier";
      }
      $user=new User();
            $user->name = $data->nom;
            $user->prenom = $data->prenom;
            $user->email = $data->email;
            $user->utilisateur = $utilisateur;
            $user->password = bcrypt($request['psw']);
            $user->save();

        DB::table($MotCle)->where('id', '=', $id)->update(array('archive'=>"non",'IdUser'=>$user->id));
        
        return redirect('Archive/'.$MotCle.'/0');
    }

    //methode pour afficher le profile 
     public function profile(Request $request,$MotCle,$id){

        if (Auth::guest())
            return redirect('/');
          

           $archive= DB::table($MotCle)->where([['archive','=','oui'],['id','=',$id],])->first();

        if($MotCle=="patients")
      {    
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

      $patient= DB::table($MotCle)->where([['archive','=','oui'],['id','=',$id],])->first();
      $consultations= Consultation::where('patient_id','=',$id)->orderBy('created_at')
      ->skip(5*$valu)->take(5)->get();
      $consults=Consultation::where('patient_id','=',$id)
         ->orderBy('created_at', 'desc')->get();
      $cntCon= Consultation::where('patient_id','=',$id)->count();
      $examens= Examen::where('patient_id','=',$id)
      ->skip(5*$valu1)->take(5)->get();
      $exams= Examen::where('patient_id','=',$id)
          ->orderBy('created_at', 'desc')->get();
      $cntEx= Examen::where('patient_id','=',$id)->count();
      $hospitalisations= Hospitalisation::where('patient_id','=',$id)
      ->skip(5*$valu2)->take(5)->get();
      $hospits= Hospitalisation::where('patient_id','=',$id)
        ->orderBy('created_at', 'desc')->get();
      $cntHos= Hospitalisation::where('patient_id','=',$id)->count();
             
           return view('archives.patient',['patient'=>$patient,'examens'=>$examens,'hospitalisations'=>$hospitalisations,'consultations'=>$consultations,'exams'=>$exams,'hospits'=>$hospits,'consults'=>$consults,'prev'=>$prev,'next'=>$next,'cntCon'=>$cntCon,'pr'=>$pr,'nxt'=>$nxt,'cntEx'=>$cntEx,'prec'=>$prec,'suiv'=>$suiv,'cntHos'=>$cntHos,'MotCle'=>$MotCle]);
      }
        elseif($MotCle=="secretaires")
           return view('archives.secretaire',['secretaire'=>$archive,'MotCle'=>$MotCle]);

        else
           return view('archives.medecinInfermier',['archive'=>$archive,'MotCle'=>$MotCle]);

     }

    //methode pour supprimer
    public function delete($MotCle,$id){

           if($MotCle == "consultations"){

            $user =Consultation::find($id);
           DB::table($MotCle)->where('id', '=',$id)->delete();
            return redirect('Patient/'.$user->patient_id);
           }



           elseif($MotCle == "ordonnances" || $MotCle == "rapports" || $MotCle == "lettre_d_orientations"){

            $user =DB::table($MotCle)->where('id', '=',$id)->first();
           DB::table($MotCle)->where('id', '=',$id)->delete();
            return redirect('Consultation/'.$user->consultation_id);
           }
           

           DB::table($MotCle)->where('id', '=',$id)->delete();
        
        return redirect('Archive/'.$MotCle.'/0');
    } 

    //function pour afficher les consultation d'un patient archié
    public function consultation($id){

        if (Auth::guest())
            return redirect('/');


        $user = Consultation::find($id);
          

        $ordonnance = Ordonnance::where('consultation_id','=',$id)->first();
        $rapport = Rapport::where('consultation_id','=',$id)->first();
        $lettre = LettreDOrientation::where('consultation_id','=',$id)->first();
        $consultation=DB::table('consultations')
        ->join('patients', 'patients.id', '=', 'consultations.patient_id')
        ->select('patients.*','consultations.*')
        ->where([['consultations.id','=',$id],['patients.id','=',$user->patient_id],])->first();
        $date=date("Y-m-d");
        

          return view('archives.afficher',['ordonnance'=>$ordonnance,'rapport'=>$rapport,'lettre'=>$lettre,'consultation'=>$consultation,'date'=>$date,'MotCle'=>"patients"]);
    }


    //fonction pour la recherche generale
    public function search(Request $request){
      $item = $request['rechercher'];
      $medecins= Medecin::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip(0)->take(6)->get();

      $cmpMd =DB::table('medecins')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();

      $infermiers= Infermier::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip(0)->take(6)->get();

      $cmpIn =DB::table('infermiers')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();

      $patients= Patient::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['NumSecurite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['taille','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['poid','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip(0)->take(6)->get();
      
      $cmpPa =DB::table('patients')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['NumSecurite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['taille','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['poid','LIKE','%'.$item.'%'],])
            ->count();

      $secretaires= Secretaire::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip(0)->take(6)->get();

      $cmpSe =DB::table('secretaires')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();

            return view('recherche',['medecins'=>$medecins,'infermiers'=>$infermiers,'patients'=>$patients,'secretaires'=>$secretaires,'cmpMd'=>$cmpMd,'cmpSe'=>$cmpSe,'cmpPa'=>$cmpPa,'cmpIn'=>$cmpIn,'motCle'=>$item]);

    }


    public function search1(Request $request,$MotCle,$motCle,$id){

        if (Auth::guest())
            return redirect('/');
          
      $item = $motCle;

        $val=0; $val1=0; $val2=0; $val3=0;

         if ($MotCle == "Patient") $val2=$id;
         elseif ($MotCle == "Infermier") $val1=$id;
         elseif ($MotCle == "Medecin")  $val=$id;
         else $val3=$id;

      $medecins= Medecin::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip($val*6)->take(6)->get();

      $cmpMd =DB::table('medecins')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();

      $infermiers= Infermier::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip($val1*6)->take(6)->get();

      $cmpIn =DB::table('infermiers')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();

      $patients= Patient::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['NumSecurite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['taille','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['poid','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip($val2*6)->take(6)->get();
      
      $cmpPa =DB::table('patients')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['NumSecurite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['taille','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['poid','LIKE','%'.$item.'%'],])
            ->count();

      $secretaires= Secretaire::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip($val3*6)->take(6)->get();

      $cmpSe =DB::table('secretaires')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();

            return view('recherche',['medecins'=>$medecins,'infermiers'=>$infermiers,'patients'=>$patients,'secretaires'=>$secretaires,'cmpMd'=>$cmpMd,'cmpSe'=>$cmpSe,'cmpPa'=>$cmpPa,'cmpIn'=>$cmpIn,'motCle'=>$item]);

    }
}
