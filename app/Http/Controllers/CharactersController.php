<?php

namespace App\Http\Controllers;

use App\Models\Character;

use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function createCharacter(Request $request)
    {
        $character = Character::create([
            "name"=>$request->name,
            "status"=>$request->status,
            "species"=>$request->species,
            "type"=>$request->type,
            "gender"=>$request->gender,
            "image"=>$request->image
        ]);

        return $character;
    }
}
