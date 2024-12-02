<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function myGames(){
        $games = Game::all();
        return response()->json($games);
    }
    public function getData(){
        $response = Http::withHeader('Authorization', env('API_KEY'))->get('http://schoolvoetbal4s.test/api/secure/games');
        $data = $response->json();
        foreach($data as $game){
        dd($game);
        }
    }
}
