<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Exception;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function random($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function Logout()
    {
        Session::flush();
        return redirect("/");
        # code...
    }
    function SignUp(Request $req)
    {
        try {
            $user = new Utilisateur;
            $user->name = $req->input("name");
            $user->email = $req->input("email");
            $pass = Hash::make($req->input("password"));
            $user->password = $pass;
            $user->new = true;
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
            $login = $req->input("login");
            if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $user = Utilisateur::where("email", "=", $login)->first();
            } else {

                $user = Utilisateur::where("username", "=", $login)->first();
            }
            $mdp = $req->input("password");
            if ($user) {
                if (Hash::check($mdp, $user->password)) {
                    Session::put("login", true);
                    Session::put("new", $user->new);
                    Session::put("nom", $user->name);
                    Session::put("id", $user->_id);
                    Session::put("email", $user->email);
                    Session::put("username", $user->username);
                    Session::put("role", $user->role);
                    Session::put('avatar', $user->avatar);

                    return response("Bienvenue", 200);
                } else {
                    return response("Vérifier votre mot de passe", 404);
                }
            } else {
                return response("Utilisateur non trouvé", 404);
            }
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
    function FirstLogin(Request $req)
    {
        try {
            $email = $req->input("email");
            $role = $req->input("role");
            $user = Utilisateur::where("email", $email)->first();
            $user->username
                = $req->input("username");
            $test = Utilisateur::where("username", $req->input("username"))->where("_id", "!=", $user->_id)->first();
            if ($test) {
                return response("Pseudo déja utilisé ! ", 500);
            }
            $test2 = Utilisateur::where("matricule", $req->input("matricule"))->first();
            if ($test2) {
                return response("Matricule déja existante ! ", 500);
            }

            $user->matricule = $req->input("matricule");
            $user->role = $req->input("role");
            if ($role == 1) {
                $user->branche = $req->input("branche");
                $user->niveau = $req->input("niveau");
                $user->groupe = $req->input("groupe");
            }
            Session::put("new", false);
            Session::put("role", $role);
            Session::put("username", $req->input("username"));
            $user->new = false;
            $user->statut = "en attente";
            $user->save();
            return response("Inscription Complète avec succèes", 200);
        } catch (\Throwable $th) {
            return response("Erreur de serveur $th", 500);
        }
    }

    function EditProfile(Request $req)
    {
        try {
            $email = $req->input("email");
            $id = Session::get("id");
            $username = $req->input("username");

            $user = Utilisateur::where("_id", $id)->first();
            if ($req->input("password") != "") {
                $user->password = Hash::make($req->input("password"));
            }
            $pass = $req->input("password");
            if ($pass != "") {
                $new = Hash::make($pass);
                $user->password = $new;
            }
            $user->name = $req->input("nom");
            if ($email != $user->email) {
                $test = Utilisateur::where("email", $email)->first();
                if ($test) {
                    return response("Email déja utilisé ! ", 401);
                } else {
                    $user->email = $email;
                }
            }
            if ($username != $user->username) {
                $test = Utilisateur::where("username", $username)->first();
                if ($test) {
                    return response("Ce pseudo est déja utilisé ! ", 401);
                } else {
                    $user->username = $username;
                }
            }
            /*  if ($req->input("role") == 1) {
                $user->branche = $req->input("branche");
                $user->niveau = $req->input("niveau");
                $user->groupe = $req->input("groupe");
            }*/
            Session::put("username", $username);
            Session::put("email", $email);
            Session::put("nom", $req->input("nom"));

            $user->save();
            return response("Modification enregistrée ! ", 200);
        } catch (Exception $th) {
            return response($th->getMessage(), 500);
        }
    }
    public function ChangeAvatar(Request $req)
    {

        try {
            $user = Utilisateur::where("_id", "=", Session::get("id"))->first();

            if ($req->hasFile("avatar")) {
                $avatar = $req->file('avatar');
                $file = $avatar;
                $file_name = $file->getClientOriginalName();
                $newname = $this->random() . $file_name;
                if ($user->avatar != "") {
                    unlink(base_path() . "/public/assets/img/avatars/$user->avatar");
                }
                $user->avatar = $newname;
                if ($user->save()) {
                    $file->move(base_path() . '/public/assets/img/avatars', $newname);
                    Session::put("avatar", $newname);
                }
                return response("Enregitré !", 200);
            } else {
                return response("Choisissez une fichier s'il vous plaît", 404);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response($th->getMessage(), 500);
        }
        # code...
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
