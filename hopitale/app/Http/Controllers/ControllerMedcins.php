<?php

namespace App\Http\Controllers;
use App\Medecin;
use App\User;
use DB;
use Image;
use Auth;

use Illuminate\Http\Request;

class ControllerMedcins extends Controller
{
    //Methode pour afficher les medcins
     public function afficher($id){

        if (Auth::guest())
            return redirect('/');
          
         if(Auth::user()->utilisateur == "Patient")
                    $this->authorize('view');
        $medecin=DB::table('medecins')->where('archive','=','non')
        ->orderBy('created_at', 'desc')->skip(6*$id)->take(6)->get();
        $cmp =DB::table('medecins')->where('archive','=','non')->count();
        $cmp/=6;
         return view('medcins.afficher',['medecins'=>$medecin,'cmp'=>$cmp]);
    }

    //Methodes pour archiver les medcins
     public function destroy(Request $request,$id){

        if (Auth::guest())
            return redirect('/');
          

        DB::table('medecins')->where('id', '=', $id)->update(array('archive'=>"oui"));
        $user=Medecin::find($id);
        DB::table('users')->where('id', '=', $user->IdUser)->delete();
        return redirect('Medecins/0');

    }

    //Methodes pour modeffier les medcins
     public function update(Request $request,$id){

        if (Auth::guest())
            return redirect('/');
          

      $this->Validate($request,['nom'=>'string|max:80',
            'prenon' => 'string|max:80',
            'adresse' => 'string|max:300',
            'grade' => 'string|max:100',
            'specialite' => 'string|max:100',
            'tlf' => 'min:10|max:10',
            'email' => 'string|email|max:255',]);

        if($request->hasFile('image')){
            $image=Medecin::where('id','=',$id)->first();
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(150, 150)->save( public_path('img/medecins/' . $filename ) );
            $image->image=$filename;
            $image->save();
        }
        
        $user=Medecin::find($id);

        DB::table('users')->where('id','=',$user->IdUser)->update(array('name'=>$request['nom'],'prenom'=>$request['prenom'],'email'=>$request['email']));

        DB::table('medecins')->where('id','=',$id)->update(array('nom'=>$request['nom'],'prenom'=>$request['prenom'],'grade'=>$request['grade'],'email'=>$request['email'],'specialite'=>$request['specialite'],'tlf'=>$request['tlf'],'adresse'=>$request['adresse'],'sexe'=>$request['sexe']));
        
        if($request['psw'])
          {
            $this->Validate($request,['psw' => 'string|min:6',]);
            DB::table('users')->where('id','=',$user->IdUser)->update(array('password'=>bcrypt($request['psw'])));
          }

           return redirect('Medecin/'.$id);

    }

    //Methodes pour recuperie les donnees pour la modeffication d'un medcins
     public function edit($id){

        if (Auth::guest())
            return redirect('/');
          

        if(Auth::user()->admin != "oui")
                    $this->authorize('update');
          $medecin=Medecin::where('archive','=','non')->where('id','=',$id)->first();
          return view('medcins.modifier',['medecin'=>$medecin]);

    }
    

    //Methode pour la recherche
    public function rechercher(Request $request){

    $item =$request['rechercher'];
      $data= Medecin::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
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

      $cmp =DB::table('medecins')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();
      $cmp/=6;
            return view('medcins.recherche',['medecins'=>$data,'cmp'=>$cmp,'motCle'=>$item]);
    }

    public function rechercher1($motCle,$id){

        if (Auth::guest())
            return redirect('/');
          

      $item=$motCle;
      $data= Medecin::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip(6*$id)->take(6)->get();

      $cmp =DB::table('medecins')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['grade','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['specialite','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();
      $cmp/=6;
            return view('medcins.recherche',['medecins'=>$data,'cmp'=>$cmp,'motCle'=>$motCle]);
    }

    //Methode pour ajouter les medcins
     public function store(Request $request){

        if (Auth::guest())
            return redirect('/');
          

      $this->Validate($request,['nom'=>'string|max:80',
            'prenon' => 'string|max:80',
            'adresse' => 'string|max:300',
            'grade' => 'string|max:100',
            'specialite' => 'string|max:100',
            'tlf' => 'min:10|max:10',
            'email' => 'string|email|max:255|unique:users',
            'psw' => 'string|min:6',]);



        $user=new User();
            $user->name = $request['nom'];
            $user->prenom = $request['prenom'];
            $user->email = $request['email'];
            $user->utilisateur = "Medecin";
            $user->password = bcrypt($request['psw']);
            $user->save();
               
        $medecin=new Medecin();
        $medecin->nom=$request['nom'];
        $medecin->prenom=$request['prenom'];
        $medecin->grade=$request['grade'];
        $medecin->specialite=$request['specialite'];
        $medecin->sexe=$request['sexe'];
        $medecin->email=$request['email'];
        $medecin->adresse=$request['adresse'];
        $medecin->tlf=$request['tlf'];
        $medecin->song=$request['groupeSanguin'];
        $medecin->datNai=$request['dateNai'];
         $medecin->IdUser=$user->id;

        if($request->hasFile('image')){
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(150,150)->save( public_path('img/medecins/' . $filename ) );
            $medecin->image = $filename;
        }

        $medecin->save();
        
         return redirect('Medecin/'.$medecin->id);
    }


    public function create(){

        if (Auth::guest())
            return redirect('/');
          
        if(Auth::user()->admin != "oui")
           $this->authorize('create');
      return view('medcins.ajouter');
    }


    //methode pour afficher le profile d'un medecin
     public function index($id){

        if (Auth::guest())
            return redirect('/');
          

         if(Auth::user()->utilisateur == "Patient")
                  $this->authorize('view');
           $medecin= Medecin::where('archive','=','non')->where('id','=',$id)->first();

           return view('medcins.medecin',['medecin'=>$medecin]);

     }

     
}
