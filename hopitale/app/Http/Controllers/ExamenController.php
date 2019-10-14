<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListeExamen;
use App\Chambre;
use App\Lit;
use Auth;
use DB;

class ExamenController extends Controller
{
    //afficher les examens
    public function index(){

        if (Auth::guest())
            return redirect('/');

        if(Auth::user()->admin != "oui")
              $this->authorize('view');

        $examens = ListeExamen::all();

        return view('examen',['examens'=>$examens]);

    }

    //ajouter un examen
    public function creat(Request $request){

        if (Auth::guest())
            return redirect('/');

        if(Auth::user()->admin != "oui")
              $this->authorize('view');


          

      $this->Validate($request,['nom'=>'string|max:30|unique:liste_examens',]);

        $nvExamen = new ListeExamen();
        $nvExamen->nom = $request['examen'];
        $nvExamen->save();

        return redirect('Examens');

    }

    //pour modiffier un examen
    public function update(Request $request,$id){

        if (Auth::guest())
            return redirect('/');

        if(Auth::user()->admin != "oui")
              $this->authorize('view');

         DB::table('liste_examens')->where('id','=',$id)->update(array('nom'=>$request['examen']));

        return redirect('Examens');

    }

    //supprimer un examen
    public function delete($id){

        if (Auth::guest())
            return redirect('/');

        if(Auth::user()->admin != "oui")
              $this->authorize('view');

        DB::table('liste_examens')->where('id', '=',$id)->delete();

        return redirect('Examens');

    }

    //affiches les chambres
    public function view(){

        if (Auth::guest())
            return redirect('/');

        if(Auth::user()->admin != "oui")
              $this->authorize('view');

        $chambres = Chambre::all();
        $lits = Lit::all();

        return view('chambre',['chambres'=>$chambres,'lits'=>$lits]);

    }

    //ajouter une chambre
    public function store(Request $request){

        if (Auth::guest())
            return redirect('/');

        if(Auth::user()->admin != "oui")
              $this->authorize('view');


          

      $this->Validate($request,['nom'=>'string|max:30|unique:liste_examens',]);

        $nvChambre = new Chambre();
        $nvChambre->service = $request['service'];
        $nvChambre->numChambre = $request['code'];
        $nvChambre->save();

        return redirect('Chambres');

    }

    //pour modiffier une chambre
    public function edit(Request $request,$id){

        if (Auth::guest())
            return redirect('/');

        if(Auth::user()->admin != "oui")
              $this->authorize('view');

        if($request['supp']!= "0"){

          DB::table('lits')->where('id', '=',$request['supp'])->delete();

        }

        if($request['ajou']!= null){

          $nvLit = new Lit();
          $nvLit->numLit = $request['ajou'];
          $nvLit->chambre_id=$id;
          $nvLit->save();

        }

        $cmpt = DB::table('lits')->where('chambre_id','=',$id)->count();
        $lits = DB::table('lits')->where('chambre_id','=',$id)->get();

        foreach ($lits as $lit) {
            if($request[$lit->id]!=null)
         DB::table('lits')->where('id','=',$lit->id)->update(array('numLit'=>$request[$lit->id]));
            
        }

         DB::table('chambres')->where('id','=',$id)->update(array('numChambre'=>$request['code'],'service'=>$request['service'],'num'=>$cmpt));

        return redirect('Chambres');

    }

    //supprimer un examen
    public function supprimer($id){

        if (Auth::guest())
            return redirect('/');

        if(Auth::user()->admin != "oui")
              $this->authorize('view');

        DB::table('chambres')->where('id', '=',$id)->delete();

        return redirect('Chambres');

    }
}
