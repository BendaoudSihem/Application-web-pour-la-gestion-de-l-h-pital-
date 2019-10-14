<?php
namespace App\Http\Controllers;
use App\Infermier;
use App\User;
use DB;
use Image;
use Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class infermierController extends Controller
{
    //Methode pour afficher les medcins
     public function afficher($id){

        if (Auth::guest())
            return redirect('/');
          
            
            if(Auth::user()->utilisateur == "Patient")
              $this->authorize('view');

        $infermier=DB::table('infermiers')->where('archive','=','non')
        ->orderBy('created_at', 'desc')->skip(6*$id)->take(6)->get();
        $cmp =DB::table('infermiers')->where('archive','=','non')->count();
        $cmp/=6;
         return view('infermiers.afficher',['infermiers'=>$infermier,'cmp'=>$cmp]);
    }

    //Methodes pour archiver les medcins
     public function destroy($id){

        if (Auth::guest())
            return redirect('/');
          

        DB::table('infermiers')->where('id', '=', $id)->update(array('archive'=>"oui"));
        $user=Infermier::find($id);
        DB::table('users')->where('id', '=', $user->IdUser)->delete();
        return redirect('Infermiers/0');

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
            $image=Infermier::where('id','=',$id)->first();
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(150, 150)->save( public_path('img/infermiers/' . $filename ) );
            $image->image=$filename;
            $image->save();
        }
        
        $user=Infermier::find($id);

        DB::table('users')->where('id','=',$user->IdUser)->update(array('name'=>$request['nom'],'prenom'=>$request['prenom'],'email'=>$request['email'],'admin'=>$request['admin']));

        DB::table('infermiers')->where('id','=',$id)->update(array('nom'=>$request['nom'],'prenom'=>$request['prenom'],'grade'=>$request['grade'],'email'=>$request['email'],'specialite'=>$request['specialite'],'tlf'=>$request['tlf'],'adresse'=>$request['adresse'],'sexe'=>$request['sexe']));
        
        if($request['psw'])
          {
            $this->Validate($request,['psw' => 'string|min:6',]);
            DB::table('users')->where('id','=',$user->IdUser)->update(array('password'=>bcrypt($request['psw'])));
          }


           return redirect('Infermier/'.$id);

    }

    //Methodes pour recuperie les donnees pour la modeffier les medcins
     public function edit($id){

        if (Auth::guest())
            return redirect('/');
          
                    if(Auth::user()->admin != "oui")
                      $this->authorize('update');

        $infermier=DB::table('infermiers')
        ->join('users', 'users.id', '=', 'infermiers.IdUser')
        ->select('users.admin','infermiers.*')
        ->where([['infermiers.archive','=','non'],['infermiers.id','=',$id],])->first();
        
          return view('infermiers.modifier',['infermier'=>$infermier]);

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
            $user->utilisateur = "Infermier";
             $user->admin=$request['admin'];

            $user->password = bcrypt($request['psw']);
            $user->save();
               
        $infermier=new Infermier();
        $infermier->nom=$request['nom'];
        $infermier->prenom=$request['prenom'];
        $infermier->grade=$request['grade'];
        $infermier->specialite=$request['specialite'];
        $infermier->sexe=$request['sexe'];
        $infermier->email=$request['email'];
        $infermier->adresse=$request['adresse'];
        $infermier->tlf=$request['tlf'];
        $infermier->datNai=$request['dateNai'];
         $infermier->song=$request['groupeSanguin'];
         $infermier->IdUser=$user->id;

        if($request->hasFile('image')){
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(150, 150)->save( public_path('img/infermiers/' . $filename ) );
            $infermier->image = $filename;
        }

        $infermier->save();
        
         return redirect('Infermier/'.$infermier->id);
    }

    public function create(){

        if (Auth::guest())
            return redirect('/');
          
           if(Auth::user()->admin != "oui")
           $this->authorize('create');
       return view('infermiers.ajouter');
    }


    

    //Methode pour la recherche
    public function rechercher(Request $request){

        if (Auth::guest())
            return redirect('/');
          

  
    $item =$request['rechercher'];
      $data= Infermier::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
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
            return view('infermiers.recherche',['infermiers'=>$data,'cmp'=>$cmp,'motCle'=>$item]);
    }

    public function rechercher1($motCle,$id){

        if (Auth::guest())
            return redirect('/');
          

      $item=$motCle;
      
      $data= Infermier::where([['archive','=','non'],['nom','LIKE','%'.$item.'%'],])
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
            return view('infermiers.recherche',['infermiers'=>$data,'cmp'=>$cmp,'motCle'=>$motCle]);
    }


     public function index($id){

        if (Auth::guest())
            return redirect('/');
          
               if(Auth::user()->utilisateur == "Patient")
               $this->authorize('view');
        $infermier=DB::table('infermiers')->where('archive','=','non')->where('id','=',$id)->first();

         return view('infermiers.infermier',['infermier'=>$infermier]);

    }
}
