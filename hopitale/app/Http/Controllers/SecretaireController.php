<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Secretaire;
use App\User;
use DB;
use Image;
use Auth;

class SecretaireController extends Controller
{//Methode pour afficher les secretaires
     public function afficher($id){

        if (Auth::guest())
            return redirect('/');
          
                 if(Auth::user()->utilisateur == "Patient")
                    $this->authorize('view');
        $secretaire=DB::table('secretaires')->where('archive','=','non')
        ->orderBy('created_at', 'desc')->skip(6*$id)->take(6)->get();
        $cmp =DB::table('secretaires')->where('archive','=','non')->count();
        $cmp/=6;
         return view('secretaires.afficher',['secretaires'=>$secretaire,'cmp'=>$cmp]);
    }

    //Methodes pour archiver les medcins
     public function destroy(Request $request,$id){

        if (Auth::guest())
            return redirect('/');
          

        DB::table('secretaires')->where('id', '=', $id)->update(array('archive'=>"oui"));
        $user=Secretaire::find($id);
        DB::table('users')->where('id', '=', $user->IdUser)->delete();
        return redirect('Secretaires/0');

    }

    //Methodes pour modeffier les secretaires
     public function update(Request $request,$id){

        if (Auth::guest())
            return redirect('/');
          

      $this->Validate($request,['nom'=>'string|max:80',
            'prenon' => 'string|max:80',
            'adresse' => 'string|max:300',
            'tlf' => 'min:10|max:10',
            'email' => 'string|email|max:255',]);

        if($request->hasFile('image')){
            $image=Secretaire::where('id','=',$id)->first();
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(150, 150)->save( public_path('img/secretaires/' . $filename ) );
            $image->image=$filename;
            $image->save();
        }
        
        $user=Secretaire::find($id);

        DB::table('users')->where('id','=',$user->IdUser)->update(array('name'=>$request['nom'],'prenom'=>$request['prenom'],'email'=>$request['email']));

        DB::table('secretaires')->where('id','=',$id)->update(array('nom'=>$request['nom'],'prenom'=>$request['prenom'],'email'=>$request['email'],'tlf'=>$request['tlf'],'adresse'=>$request['adresse'],'sexe'=>$request['sexe']));
        
        if($request['psw'])
          {
            $this->Validate($request,['psw' => 'string|min:6',]);
            DB::table('users')->where('id','=',$user->IdUser)->update(array('password'=>bcrypt($request['psw'])));
          }

           return redirect('Secretaire/'.$id);

    }

    //Methodes pour recuperie les donnees pour la modeffication d'une secretaire
     public function edit($id){

        if (Auth::guest())
            return redirect('/');
          
                 if(Auth::user()->admin != "oui")
                     $this->authorize('update');
        $secretaire=Secretaire::where('archive','=','non')->where('id','=',$id)->first();
          return view('secretaires.modifier',['secretaire'=>$secretaire]);

    }
    

    //Methode pour la recherche
    public function rechercher(Request $request){

        if (Auth::guest())
            return redirect('/');
          

    $item =$request['rechercher'];
      $data= Secretaire::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])           ->orderBy('created_at', 'desc')
            ->skip(0)->take(6)->get();
            
      $cmp =DB::table('secretaires')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();
      $cmp/=6;
            return view('secretaires.recherche',['secretaires'=>$data,'cmp'=>$cmp,'motCle'=>$item]);
    }

    public function rechercher1($motCle,$id){

        if (Auth::guest())
            return redirect('/');
          

      $item=$motCle;
      $data= Secretaire::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->orderBy('created_at', 'desc')
            ->skip(6*$id)->take(6)->get();

      $cmp =DB::table('medecins')->where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['prenom','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['adresse','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['sexe','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['song','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['email','LIKE','%'.$item.'%'],])
            ->orwhere([['archive','=','non'],['tlf','LIKE','%'.$item.'%'],])
            ->count();
      $cmp/=6;
            return view('secretaires.recherche',['secretaires'=>$data,'cmp'=>$cmp,'motCle'=>$motCle]);
    }

    //Methode pour ajouter les secretaires
     public function store(Request $request){

        if (Auth::guest())
            return redirect('/');
          

      $this->Validate($request,['nom'=>'string|max:80',
            'prenon' => 'string|max:80',
            'adresse' => 'string|max:300',
            'tlf' => 'min:10|max:10',
            'email' => 'string|email|max:255|unique:users',
            'psw' => 'string|min:6',]);



        $user=new User();
            $user->name = $request['nom'];
            $user->prenom = $request['prenom'];
            $user->email = $request['email'];
            $user->utilisateur = "Secretaire";
            $user->password = bcrypt($request['psw']);
            $user->save();
               
        $secretaire=new Secretaire();
        $secretaire->nom=$request['nom'];
        $secretaire->prenom=$request['prenom'];
        $secretaire->sexe=$request['sexe'];
        $secretaire->email=$request['email'];
        $secretaire->adresse=$request['adresse'];
        $secretaire->tlf=$request['tlf'];
        $secretaire->song=$request['groupeSanguin'];
        $secretaire->datNai=$request['dateNai'];
         $secretaire->IdUser=$user->id;

        if($request->hasFile('image')){
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(150,150)->save( public_path('img/secretaires/' . $filename ) );
            $secretaire->image = $filename;
        }

        $secretaire->save();
        
         return redirect('Secretaire/'.$secretaire->id);
    }


    public function create(){

        if (Auth::guest())
            return redirect('/');
          
        if(Auth::user()->admin != "oui")
         $this->authorize('create');
      return view('secretaires.ajouter');
    }


    //methode pour afficher le profile d'une secretaire
     public function index($id){

        if (Auth::guest())
            return redirect('/');
          
                       if(Auth::user()->utilisateur == "Patient")
                        $this->authorize('view');
       $secretaire= Secretaire::where('archive','=','non')->where('id','=',$id)->first();

           return view('secretaires.secretaire',['secretaire'=>$secretaire]);

     }

     
}
