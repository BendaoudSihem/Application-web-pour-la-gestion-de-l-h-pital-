<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HopitalePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     public function view(User $user)
    {
        //tous le monde permet de consulter sauf les patients peut pas
        
        return true ;
    }

    public function consultation(User $user)
    {
        //
        if ($user->utilisateur == "Patient" || $user->utilisateur == "Secretaire") {
            return false;
        }
        return true ;
    }

    
    public function create(User $user)
    {
        // sauf un infermier admin permet de creer 
        return $user->admin === "oui";
    }

    public function patient(User $user)
    {
        // sauf un infermier admin ou une secretaire permettent de restaurer un patient 
        if ($user->utilisateur == "Secretaire" || $user->admin == "oui") {
            return true;
        }
        return false ;
    }

    public function restaurer(User $user)
    {
        // sauf un infermier admin permet de restaurer
        return $user->admin === "oui";
    }


    public function update(User $user)
    {
        // sauf un infermier admin permet de modifier 
        return $user->admin === "oui";
    }

    
    public function delete(User $user)
    {
        // sauf un infermier admin permet de supprimer 
        return $user->admin === "oui";
    }
}
