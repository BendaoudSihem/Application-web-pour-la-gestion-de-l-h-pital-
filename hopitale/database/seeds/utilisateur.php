<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Infermier;
use App\Medecin;
use App\Secretaire;
use App\Patient;

class utilisateur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      /*  $admin =new User();

        $admin->name = "admin";
        $admin->prenom = "admin";
        $admin->utilisateur = "Infermier";
        $admin->admin="oui";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt("admin");
        $admin->save();
         
        

         

        $infermier = new Infermier();
        $infermier->nom="admin";
        $infermier->prenom="admin";
        $infermier->grade="grade";
        $infermier->specialite="specialite";
        $infermier->sexe="Male";
        $infermier->email="admin@gmail.com";
        $infermier->adresse="adresse";
        $infermier->tlf="0512456348";
        //$infermier->datNai="10-10-1985";
         $infermier->song="A+";
         $infermier->IdUser=$admin->id;
         $infermier->save();*/

       
       $infermier1 =new User();

        $infermier1->name = "gherrab";
        $infermier1->prenom = "leila";
        $infermier1->utilisateur = "Infermier";
        $infermier1->admin="non";
        $infermier1->email = "leilagh@gmail.com";
        $infermier1->password = bcrypt("leilagh");
        $infermier1->save();

        $infermier11 = new Infermier();
        $infermier11->nom="gherrab";
        $infermier11->prenom="leila";
        $infermier11->grade="ATS";
        $infermier11->specialite="radio";
        $infermier11->sexe="Femme";
        $infermier11->email="leilagh@gmail.com";
        $infermier11->adresse="remchi";
        $infermier11->tlf="0541240403";
        //$infermier11->datNai="1968-05-05";
         $infermier11->song="A+";
         $infermier11->IdUser=$infermier1->id;
         $infermier11->save();


        $infermier2 =new User();

        $infermier2->name = "belhadj";
        $infermier2->prenom = "wahiba";
        $infermier2->utilisateur = "Infermier";
        $infermier2->admin="non";
        $infermier2->email = "wahibabel@gmail.com";
        $infermier2->password = bcrypt("wahibabel");
        $infermier2->save();

         
        $infermier22 = new Infermier();
        $infermier22->nom="belhadj";
        $infermier22->prenom="wahiba";
        $infermier22->grade="ATS";
        $infermier22->specialite="laboratoire";
        $infermier22->sexe="Femme";
        $infermier22->email="wahibabel@gmail.com";
        $infermier22->adresse="remchi";
        $infermier22->tlf="0541240403";
        $infermier22->datNai="14-06-1983";
         $infermier22->song="o+";
         $infermier22->IdUser=$infermier2->id;
         $infermier22->save();  


         $infermier3 =new User();

        $infermier3->name = "ali";
        $infermier3->prenom = "ali";
        $infermier3->utilisateur = "Infermier";
        $infermier3->admin="non";
        $infermier3->email = "aliali@gmail.com";
        $infermier3->password = bcrypt("aliali");
        $infermier3->save();

         
        $infermier33 = new Infermier();
        $infermier33->nom="ali";
        $infermier33->prenom="ali";
        $infermier33->grade="ATS";
        $infermier33->specialite="anesthesie";
        $infermier33->sexe="Homme";
        $infermier33->email="aliali@gmail.com";
        $infermier33->adresse="tlemcen";
        $infermier33->tlf="05412407825";
        $infermier33->datNai="08-08-1988";
        $infermier33->song="O-";
        $infermier33->IdUser=$infermier3->id;
        $infermier33->save();  
      
//Medecins

        $medecin1 =new User();

        $medecin1->name = "khaled";
        $medecin1->prenom = "mohamed";
        $medecin1->utilisateur = "Medecin";
        $medecin1->admin="non";
        $medecin1->email = "khaledmohamed@gmail.com";
        $medecin1->password = bcrypt("khaledmohamed");
        $medecin1->save();
         
        

        $medecin11 = new Medecin();
        $medecin11->nom="khaled";
        $medecin11->prenom="mohamed";
        $medecin11->grade="generaliste";
        $medecin11->specialite="radiologie";
        $medecin11->sexe="Male";
        $medecin11->email="khaledmohamed@gmail.com";
        $medecin11->adresse="tlemcen";
        $medecin11->tlf="0512456378";
        $medecin11->datNai="07-12-1985";
         $medecin11->song="O+";
         $medecin11->IdUser=$medecin1->id;
         $medecin11->save();

     $medecin2 =new User();

        $medecin2->name = "bendaoud";
        $medecin2->prenom = "wided";
        $medecin2->utilisateur = "Medecin";
        $medecin2->admin="non";
        $medecin2->email = "wided@gmail.com";
        $medecin2->password = bcrypt("widedwided");
        $medecin2->save();
         
        

        $medecin22 = new Medecin();
        $medecin22->nom="bendaoud";
        $medecin22->prenom="wided";
        $medecin22->grade="resident";
        $medecin22->specialite="dentiste";
        $medecin22->sexe="Femme";
        $medecin22->email="wided@gmail.com";
        $medecin22->adresse="tlemcen";
        $medecin22->tlf="0512456358";
        $medecin22->datNai="08-04-1950";
         $medecin22->song="A+";
         $medecin22->IdUser=$medecin2->id;
         $medecin22->save();
        
      $medecin3 =new User();

        $medecin3->name = "bendaoud";
        $medecin3->prenom = "sihem";
        $medecin3->utilisateur = "Medecin";
        $medecin3->admin="non";
        $medecin3->email = "bendaoud88@gmail.com";
        $medecin3->password = bcrypt("bendaoud");
        $medecin3->save();
         
        

        $medecin33 = new Medecin();
        $medecin33->nom="bendaoud";
        $medecin33->prenom="sihem";
        $medecin33->grade="resident";
        $medecin33->specialite="cardiologie";
        $medecin33->sexe="Femme";
        $medecin33->email="bendaoud88@gmail.com";
        $medecin33->adresse="imama";
        $medecin33->tlf="0512456389";
        $medecin33->datNai="14-03-1989";
         $medecin33->song="B+";
         $medecin33->IdUser=$medecin3->id;
         $medecin33->save();
      
   //secetaire

        $secretaire1 =new User();

        $secretaire1->name = "bendaoud";
        $secretaire1->prenom = "sihem";
        $secretaire1->utilisateur = "Secretaire";
        $secretaire1->admin="non";
        $secretaire1->email = "bendaoud11@gmail.com";
        $secretaire1->password = bcrypt("bendaoud");
        $secretaire1->save();
        

        $secretaire11 = new Secretaire();
        $secretaire11->nom="bendaoud";
        $secretaire11->prenom="amel";
        $secretaire11->sexe="Femme";
        $secretaire11->email="bendaoud11@gmail.com";
        $secretaire11->adresse="tlemcen";
        $secretaire11->tlf="0512476389";
        $secretaire11->datNai="29-12-1986";
         $secretaire11->song="B+";
         $secretaire11->IdUser=$secretaire->id;
         $secretaire11->save();

       $secretaire2 =new User();

        $secretaire2->name = "gherrab";
        $secretaire2->prenom = "khalida";
        $secretaire2->utilisateur = "Secretaire";
        $secretaire2->admin="non";
        $secretaire2->email = "khalida@gmail.com";
        $secretaire2->password = bcrypt("khalida");
        $secretaire2->save();
        

        $secretaire22 = new Secretaire();
        $secretaire22->nom="gherrab";
        $secretaire22->prenom="khalida";
        $secretaire22->sexe="Femme";
        $secretaire22->email="khalida@gmail.com";
        $secretaire22->adresse="tlemcen";
        $secretaire22->tlf="0578476389";
        $secretaire22->datNai="05-12-1989";
         $secretaire22->song="A+";
         $secretaire22->IdUser=$secretaire->id;
         $secretaire22->save();

//patient NumSecurite
       $patient1 =new User();

        $patient1->name = "bendaoud";
        $patient1->prenom = "radjaa";
        $patient1->utilisateur = "Ptient";
        $patient1->admin="non";
        $patient1->email = "radjaa@gmail.com";
        $patient1->password = bcrypt("bendaoud");
        $patient1->save();
        

        $patient11 = new Patient();
        $patient11->nom="bendaoud";
        $patient11->prenom="radjaa";
        $patient11->sexe="enfant";
        $patient11->email="radjaa@gmail.com";
        $patient11->adresse="tlemcen";
        $patient11->tlf="0577476389";
        $patient11->datNai="09-02-2005";
         $patient11->song="B+";
         $patient11->NumSecurite="123782";
         $patient11->taille="140";
         $patient11->poid="30";

         $patient11->IdUser=$patient1->id;
         $patient11->save();

          $patient2 =new User();

        $patient2->name = "khaled";
        $patient2->prenom = "ritedj";
        $patient2->utilisateur = "Patient";
        $patient2->admin="non";
        $patient2->email = "ritedj@gmail.com";
        $patient2->password = bcrypt("ritedj");
        $patient2->save();
        

        $patient22 = new Patient();
        $patient22->nom="khaled";
        $patient22->prenom="ritedj";
        $patient22->sexe="enfant";
        $patient22->email="ritedj@gmail.com";
        $patient22->adresse="remchi";
        $patient22->tlf="0577876389";
        $patient22->datNai="10-03-2015";
         $patient22->song="B+";
         $patient22->NumSecurite="756941";
         $patient22->taille="100";
         $patient->poid="20";

         $patient22->IdUser=$patient2->id;
         $patient22->save();


       
    }
