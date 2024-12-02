<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function games(){
        $teams = Team::all();
    if ($teams->count() < 2) {
        return "Er zijn niet genoeg teams om wedstrijden te genereren.";
    }
    foreach ($teams as $teamA) {
        foreach ($teams as $teamB) {
            if ($teamA->id < $teamB->id) {
                $match = Matchh::create();
                $match->teams()->attach([$teamA->id, $teamB->id]);
            }
        }
    }
    }
}
