<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    function SignUp(Request $req)
    {
        try {
            $user = new Utilisateur;
            $user->name = $req->input("name");
            $user->email = $req->input("email");
            $pass = Hash::make($req->input("password"));
            $user->password = $pass;
            $test = Utilisateur::where("email", $req->input("email"))->first();
            if (!$test) {
                $user->save();
                return 1;
            }

            return 0;
        } catch (\Throwable $th) {
            return $th;
        }

        # code...
    }
    function Login(Request $req)
    {
        try {
            $email = $req->input("email");
            $mdp = $req->input("password");
            $user = Utilisateur::where("email", "=", $email)->first();
            if ($user) {
                if (Hash::check($mdp, $user->password)) {
                    return response("Bienvenue", 200);
                } else {
                    return response("Vérifier votre mot de passe", 404);
                }
            } else {
                return response("Utilisateur non trouvé", 404);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    function FirstLogin(Request $req)
    {
        try {
            $email = $req->input("email");
            $role = $req->input("role");
            $user = Utilisateur::where("email", $email)->first();

            $user->matricule = $req->input("matricule");
            $user->role = $req->input("role");
            if ($role == 1) {
                $user->branche = $req->input("branche");
                $user->niveau = $req->input("niveau");
                $user->groupe = $req->input("groupe");
            }
            $user->save();
            return response("Compte crée avec succées", 200);
        } catch (\Throwable $th) {
            return response("Erreur de serveur $th", 500);
        }
    }

    function EditProfile(Request $req)
    {
        try {
            $email = $req->input("email");
            $id = Session::get("id");
            $user = Utilisateur::where("_id", $id)->first();
            if ($req->input("password") != "") {
                $user->password = Hash::make($req->input("password"));
            }
            $user->nom = $req->input("nom");
            if ($email != Session::get("email")) {
                $test = Utilisateur::where("email", $email)->first();
                if ($test) {
                    return response("Email déja utilisé ! ", 401);
                } else {
                    $user->email = $email;
                }
            }
            if ($req->input("role") == 1) {
                $user->branche = $req->input("branche");
                $user->niveau = $req->input("niveau");
                $user->groupe = $req->input("groupe");
            }
            return response("Modification enregistrée ! ", 200);
        } catch (\Throwable $th) {
            return response("Erreur de serveur", 500);
        }
    }

    function VerifyMail(Request $req)
    {
        try {
            $email = $req->input("email");
            $user = Utilisateur::where("email", $email)->first();
            if ($user) {
                return response("Email déja utilisée", 500);
            } else {
                return response("Email n'existe pas", 200);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
