<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Consultation;
use App\Ordonnance;
use App\Rapport;
use App\LettreDOrientation;
use App\Hospitalisation;
use App\Patient;
use Auth;
use App\User;
use Image;
use App\Examen;
use App\Lit;
use App\Chambre;

class ConsultationController extends Controller
{
    //affiche le formullaire de creation une nouvelle consultation
    public function creat($test,$id){

        if (Auth::guest())
            return redirect('/');
        
        if(Auth::user()->utilisateur == "Patient" || Auth::user()->utilisateur == "Secretaire")
                    $this->authorize('view');
    	
    	if($test==0){
    		$consult = new Consultation();
    	    $consult->patient_id=$id;
          $consult->created_at=date("Y-m-d");
    	    $consult->save();
    	    $test=$consult->id;
      }

    	    return redirect('Consultation/'.$test);

    }

     public function index($id){

        if (Auth::guest())
            return redirect('/');
         
        
                    
        $ordonnance = Ordonnance::where('consultation_id','=',$id)->first();
        $rapport = Rapport::where('consultation_id','=',$id)->first();
        $lettre = LettreDOrientation::where('consultation_id','=',$id)->first();
        $user = Consultation::find($id);
        $consultation=DB::table('consultations')
        ->join('patients', 'patients.id', '=', 'consultations.patient_id')
        ->select('patients.*','consultations.*')
        ->where([['consultations.id','=',$id],['patients.id','=',$user->patient_id],])->first();
        $date=date("Y-m-d");
        if($ordonnance != null || $rapport != null || $lettre != null)
          return view('consultations.afficher',['ordonnance'=>$ordonnance,'rapport'=>$rapport,'lettre'=>$lettre,'consultation'=>$consultation,'date'=>$date]);

          return view('consultations.ajouter',['consultation'=>$consultation]);

    }


    //fuction pour ajouter une ordonnace , rapport et une lettre d'orientation
     public function store(Request $request,$MotCle,$id){

        if (Auth::guest())
            return redirect('/');
           
             $this->Validate($request,[$MotCle => 'min:10|max:255',]);
           if($MotCle=="Ordonnance")
     	     $data = new Ordonnance();
     	   elseif ($MotCle=="Rapport") 
     	   	 $data = new Rapport();
     	   else
     	   	 $data = new LettreDOrientation();
         
     	$data->consultation_id = $id;
     	$data->desc = $request[$MotCle];
        $data->save();

     	return redirect('Consultation/'.$id);

     }

     //function pour modifier une ordonnace , rapport et une lettre d'orientation
      public function update(Request $request,$MotCle,$id){

        if (Auth::guest())
            return redirect('/');
          if(Auth::user()->utilisateur == "Patient" || Auth::user()->utilisateur == "Secretaire")   
             $this->Validate($request,[$MotCle => 'min:10|max:255',]);
           if($MotCle=="Ordonnance")
             DB::table('ordonnances')->where('consultation_id','=',$id)->update(array('desc'=>$request[$MotCle]));
           elseif ($MotCle=="Rapport") 
             DB::table('rapports')->where('consultation_id','=',$id)->update(array('desc'=>$request[$MotCle]));
           else
             DB::table('lettre_d_orientations')->where('consultation_id','=',$id)->update(array('desc'=>$request[$MotCle]));


        return redirect('Consultation/'.$id);

      }

    //fonction affiche le contenu à imprimer
      public function imprimer(Request $request,$MotCle,$id){

        if (Auth::guest())
            return redirect('/');

        if($MotCle=="Ordonnance")
             $imprime = DB::table('ordonnances')->where('consultation_id','=',$id)->first();
           elseif ($MotCle=="Rapport") 
             $imprime = DB::table('rapports')->where('consultation_id','=',$id)->first();
           else{
             $imprime =DB::table('lettre_d_orientations')->where('consultation_id','=',$id)->first();
             $MotCle="Lettre d'orientation";
           }

         $user = Consultation::find($id);
         $consultation=DB::table('consultations')
        ->join('patients', 'patients.id', '=', 'consultations.patient_id')
        ->select('patients.*','consultations.*')
        ->where([['consultations.id','=',$id],['patients.id','=',$user->patient_id],])->first();
        $date=date("Y-m-d");
                 
                 return view('consultations.imprimer',['imprimer'=>$imprime,'consultation'=>$consultation,'MotCle'=>$MotCle,'date'=>$date]);
      }

      //function pour ajouter une hospitalisation
      public function create(Request $request,$id){

        if (Auth::guest())
            return redirect('/');





        $chamb=Chambre::where([['service','=',$request['service']],['numChambre','=',$request['numCh']],])->first();

        if($chamb==null) return redirect('Patient/'.$id);

          
          $nv = new Hospitalisation();
          $nv->patient_id = $id;
          $nv->lit_num = $request['lit'];
          $nv->chambre_num = $request['numCh'];
          $nv->service = $request['service'];
          $nv->debut = $request['debut'];
          $nv->fin = $request['fin'];
          $nv->save();

           DB::table('lits')->where('chambre_id','=',$chamb->id)->update(array('dispo'=>"oui"));


          return redirect('Patient/'.$id);

      }

     //fonction pour modifier l'hospitalisation
     public function edit(Request $request,$id){

        if (Auth::guest())
            return redirect('/');

        $hosp=Hospitalisation::find($id);
        $lit=Lit::find($request['lit']);

        if($hosp->chambre_num != $request['numCh'])
        $chambre=Chambre::where('id','=',$request['numCh'])->first();
         else 
        $chambre=Chambre::where('numChambre','=',$request['numCh'])->first();

        if($hosp->service != null ){

        $chamb=Chambre::where([['service','=',$hosp->service],['numChambre','=',$hosp->chambre_num],])->first();

        $litt=Lit::where([['numLit','=',$hosp->lit_num],['chambre_id','=',$chamb->id],])->first();

        }


        DB::table('hospitalisations')->where('id','=',$id)->update(array('lit_num'=>$lit->numLit,'chambre_num'=>$chambre->numChambre,'debut'=>$request['debut'],'fin'=>$request['fin'],'service'=>$request['service']));


        DB::table('lits')->where('id','=',$lit->id)->update(array('dispo'=>"oui"));

       if($hosp->lit_num != null)
        DB::table('lits')->where('id','=',$litt->id)->update(array('dispo'=>"non"));

        $user=Hospitalisation::where('id','=',$id)->first();
          return redirect('Patient/'.$user->patient_id);
      
     }

     //fuction pour supprimer une hospitalisation
     public function delete(Request $request,$id){

        if (Auth::guest())
            return redirect('/');

        $user=Hospitalisation::find($id);
        DB::table('hospitalisations')->where('id', '=', $id)->delete();

          return redirect('Patient/'.$user->patient_id);

     }

     //function pour ajouter un rendes vous
     public function rendezVous(Request $request,$id){

        if (Auth::guest())
            return redirect('/');

      if(Auth::user()->utilisateur == "Patient" )
                    $this->authorize('view');

          if($request['rendez']=="examens"){
               $this->Validate($request,['nom' => 'min:1|max:255',
                    'date' => 'required']);
            $rend = new Examen();
            $rend->nom = $request['nom'];
          }
          else {
            $rend = new Hospitalisation();
               $this->Validate($request,['date' => 'required',
                    'fin' => 'required']);
            $rend->debut = $request['date'];
            $rend->fin = $request['fin'];
          }

          $rend->patient_id =$id;
          $rend->rendez_vous = $request['date'];
          $rend->save();

          return redirect('Patient/'.$id);

     }

     //function pour ajouter un examen
     public function ajouter(Request $request,$id){

        if (Auth::guest())
            return redirect('/');

      
            $examen = new Examen();
            $examen->nom = $request['nom'];
            $examen->desc = $request['examen'];
            $examen->patient_id =$id;
            $examen->rendez_vous = $request['date'];

            if($request->hasFile('image')){
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(200, 200)->save( public_path('img/examens/' . $filename ) );
            $examen->fichier=$filename;
             }

            $examen->save();

          return redirect('Patient/'.$id);

     }

     //function pour modifier un examen
     public function modifier(Request $request,$id){

        if (Auth::guest())
            return redirect('/');

      $examen = Examen::find($id);

            if ($request['examen'] == null) 
        DB::table('examens')->where('id','=',$id)->update(array('nom'=>$request['nom'],'rendez_vous'=>$request['rendez']));

          elseif($examen->rendez_vous == null)
        DB::table('examens')->where('id','=',$id)->update(array('nom'=>$request['nom'],'desc'=>$request['examen']));

          else
        DB::table('examens')->where('id','=',$id)->update(array('nom'=>$request['nom'],'created_at'=>$request['rendez'],'desc'=>$request['examen'],'rendez_vous'=>null));



            if($request->hasFile('image')){
            $examen = Examen::find($id);
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(200, 200)->save( public_path('img/examens/' . $filename ) );
            $examen->fichier=$filename;
            $examen->save();
             }


          return redirect('Patient/'.$examen->patient_id);

     }

     //function pour supprimer un examen
     public function supprimer($id){

        if (Auth::guest())
            return redirect('/');

      $examen = Examen::find($id);

          DB::table('examens')->where('id', '=', $id)->delete();

            return redirect('Patient/'.$examen->patient_id);

     }


}
