<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cour;
use App\Models\Utilisateur;
use Exception;
use Session;

class CourController extends Controller
{
    //

    function AddCour(Request $req)
    {
        try {
            $ctrl = new UserController();
            $nom = $req->input("nom");
            $prof = Utilisateur::where("_id", Session::get("id"))->first();
            $profID = Session::get("id");
            $branche = $req->input("branche");
            $niveau = $req->input("niveau");
            $links = $req->input("links");
            $idCour = $ctrl->random();
            $Cour = new Cour;
            $Cour->_id = $idCour;
            $Cour->nomCour = $nom;
            $Cour->professeur = $profID;
            $Cour->branche = $branche;
            $Cour->niveau = $niveau;
            $Cour->push("links", $links);
            if ($req->hasFile("file")) {
                $files = $req->file("file");
                foreach ($files as $file) {
                    # code...
                    $file_name = $file->getClientOriginalName();
                    $newname = $ctrl->random() . $file_name;
                    $file->move(base_path() . '/public/assets/uploads/Courses', $newname);
                    $Cour->push("files", [$newname]);
                }
            }
            if ($Cour->save()) {
                $prof->push("Cours", [$idCour]);
                $prof->save();
                return response("Cour bien ajouté !", 200);
            }
        } catch (Exception $th) {
            return response($th->getMessage(), 500);
        }
    }
}
