<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Consultation;
use App\User;
use App\Hospitalisation;
use App\Examen;
use App\Chambre;
use App\Lit;
use DB;
use App\ListeExamen;
use Image;
use Auth;

class PatientController extends Controller
{

    //Methode pour afficher les medcins
     public function afficher($id){

        if (Auth::guest())
            return redirect('/');
          
                  if(Auth::user()->utilisateur == "Patient")
                     $this->authorize('view');
        $patient=DB::table('patients')->where('archive','=','non')
        ->orderBy('created_at', 'desc')->skip(6*$id)->take(6)->get();
        $cmp =DB::table('patients')->where('archive','=','non')->count();
        $cmp/=15;
         return view('patients.afficher',['patients'=>$patient,'cmp'=>$cmp]);
    }

    //Methodes pour archiver les patients
     public function destroy(Request $request,$id){

        if (Auth::guest())
            return redirect('/');
          

        DB::table('patients')->where('id', '=', $id)->update(array('archive'=>"oui"));
        $user=Patient::find($id);
        DB::table('users')->where('id', '=', $user->IdUser)->delete();
        
        return redirect('Patients/0');

    }

    //Methodes pour modeffier les patients
     public function update(Request $request,$id){

        if (Auth::guest())
            return redirect('/');
          

      $this->Validate($request,['nom'=>'string|max:80',
            'prenon' => 'string|max:80',
            'adresse' => 'string|max:300',
            'NumSecurite' => 'min:6|max:6',
            'tlf' => 'min:10|max:10',
            'email' => 'string|email|max:255',]);

        if($request->hasFile('image')){
            $image=Patient::where('id','=',$id)->first();
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(150, 150)->save( public_path('img/patients/' . $filename ) );
            $image->image=$filename;
            $image->save();
        }
        
        $user=Patient::find($id);

        DB::table('users')->where('id','=',$user->IdUser)->update(array('name'=>$request['nom'],'prenom'=>$request['prenom'],'email'=>$request['email']));

        DB::table('patients')->where('id','=',$id)->update(array('nom'=>$request['nom'],'prenom'=>$request['prenom'],'adresse'=>$request['adresse'],'email'=>$request['email'],'NumSecurite'=>$request['NumSecurite'],'tlf'=>$request['tlf'],'sexe'=>$request['sexe'],'taille'=>$request['taille'],'poid'=>$request['poid']));
        
        if($request['psw'])
          {
            $this->Validate($request,['psw' => 'string|min:6',]);
            DB::table('users')->where('id','=',$user->IdUser)->update(array('password'=>bcrypt($request['psw'])));
          } 

           return redirect('Patient/'.$id.'/edit');

    }

    //Methodes pour recuperie les donnees pour la modeffication d'un patient
     public function edit($id){

        if (Auth::guest())
            return redirect('/');
          
          $patient=Patient::where('archive','=','non')->where('id','=',$id)->first();
          return view('patients.modifier',['patient'=>$patient]);

    }

    public function rechercher(Request $request){

        if (Auth::guest())
            return redirect('/');
          

      $item =$request['rechercher'];

      $data= Patient::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
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
      
      $cmp =DB::table('patients')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
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
      $cmp/=6;
            return view('patients.recherche',['patients'=>$data,'cmp'=>$cmp,'motCle'=>$item]);
    }

     public function rechercher1($motCle,$id){

        if (Auth::guest())
            return redirect('/');
          

      $item=$motCle;
      $data= Patient::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
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
            ->skip(6*$id)->take(6)->get();
      
      $cmp =DB::table('patients')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
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
      $cmp/=6;
            return view('patients.recherche',['patients'=>$data,'cmp'=>$cmp,'motCle'=>$item]);
    }

    //Methode pour ajouter les patients
     public function store(Request $request){

        if (Auth::guest())
            return redirect('/');
          

               $this->Validate($request,['nom'=>'string|max:80',
            'prenon' => 'string|max:80',
            'adresse' => 'string|max:300',
            'NumSecurite' => 'min:6|max:6',
            'tlf' => 'min:10|max:10',
            'email' => 'string|email|max:255|unique:users',
            'psw' => 'string|min:6',]);



        $user=new User();
            $user->name = $request['nom'];
            $user->prenom = $request['prenom'];
            $user->email = $request['email'];
            $user->utilisateur = "Patient";
            $user->password = bcrypt($request['psw']);
            $user->save();

        $patient=new Patient();
        $patient->nom=$request['nom'];
        $patient->prenom=$request['prenom'];
        $patient->datNai=$request['dateNai'];
        $patient->adresse=$request['adresse'];
        $patient->email=$request['email'];
        $patient->NumSecurite=$request['NumSecurite'];
        $patient->tlf=$request['tlf'];
         $patient->sexe=$request['sexe'];
         $patient->song=$request['groupeSanguin'];
         $patient->taille=$request['taille'];
         $patient->poid=$request['poid'];
         $patient->IdUser=$user->id;
         $patient->created_at=date("Y-m-d");

        if($request->hasFile('image')){
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(150, 150)->save( public_path('img/patients/' . $filename ) );
            $patient->image = $filename;
        }

        $patient->save();

        
         return redirect('Patient/'.$patient->id);
    }

    public function create(){

        if (Auth::guest())
            return redirect('/');
          
      return view('patients.ajouter');
    }


   //methode pour afficher le profile d'un patient
     public function index(Request $request,$id){

        if (Auth::guest())
            return redirect('/');
          
                 if(Auth::user()->utilisateur == "Patient")
                     $this->authorize('view');
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

      $patient= Patient::where('archive','=','non')->where('id','=',$id)->first();
      $consultations= Consultation::where('patient_id','=',$id)->orderBy('created_at', 'desc')->skip(5*$valu)->take(5)->get();
      $cntCon= Consultation::where('patient_id','=',$id)->count();
      $cntCon /=5;
      $consults=Consultation::where('patient_id','=',$id)
         ->orderBy('created_at', 'desc')->get();
      $examens= Examen::where('patient_id','=',$id)->orderBy('created_at', 'desc')
      ->skip(5*$valu1)->take(5)->get();
      $exams= Examen::where('patient_id','=',$id)
          ->orderBy('created_at', 'desc')->get();
      $cntEx= Examen::where('patient_id','=',$id)->count();
      $cntEx/=5;
      $hospitalisations= Hospitalisation::where('patient_id','=',$id)->orderBy('created_at', 'desc')->skip(5*$valu2)->take(5)->get();
      $hospits= Hospitalisation::where('patient_id','=',$id)
        ->orderBy('created_at', 'desc')->get();
      $cntHos= Hospitalisation::where('patient_id','=',$id)->count();
      $cntHos/=5;
      $chambres=Chambre::orderBy('numChambre', 'asc')->get();
      $services=Chambre::distinct()->orderBy('service', 'asc')->get();
      $lits = Lit::where('dispo','=','non')->orderBy('numLit', 'asc')->distinct()->get();

      $listexamens = ListeExamen::all();

       $date=date("Y-m-d");
             
           return view('patients.patient',['patient'=>$patient,'examens'=>$examens,'hospitalisations'=>$hospitalisations,'consultations'=>$consultations,'exams'=>$exams,'hospits'=>$hospits,'consults'=>$consults,'prev'=>$prev,'next'=>$next,'cntCon'=>$cntCon,'pr'=>$pr,'nxt'=>$nxt,'cntEx'=>$cntEx,'prec'=>$prec,'suiv'=>$suiv,'cntHos'=>$cntHos,'lits'=>$lits,'chambres'=>$chambres,'services'=>$services,'date'=>$date,'listexamens'=>$listexamens]);

     }

     
}
