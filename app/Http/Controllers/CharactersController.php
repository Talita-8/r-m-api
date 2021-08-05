<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CharactersController extends Controller
{
    public function createCharacter(Request $request)
    {

        $validated = $request->validate([
            "name"=>"required",
            "status"=>"required",
            "species"=>"required",
            "type"=>"required",
            "gender"=>"required",
            "image"=>"required"
        ]);


      try
      {
        $character = Character::create([
            "name"=>$request->name,
            "status"=>$request->status,
            "species"=>$request->species,
            "type"=>$request->type,
            "gender"=>$request->gender,
            "image"=>$request->image
        ]);

            return new JsonResponse($character, Response::HTTP_OK);
        }
        catch(Exception $error)
        {
            return new JsonResponse($error->errorInfo[2], Response::HTTP_BAD_REQUEST);
        }
     }
}
