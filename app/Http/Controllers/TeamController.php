<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;

class TeamController extends Controller
{
    //
    public function index(){

     //   $teams = 3;

    }
    public function create(){
        return view('teamRegister');
   }
   public function addTeams(Request $request){
         $newTeam = new Team;
         $newTeam->name = $request->name;
         $newTeam->hometown = $request->hometown;
         $newTeam->goals = $request->goals;
         $newTeam->save();
         return redirect()->route('createTeam');
    }
    public function createMember(){
        return view('memberRegister');
   }
   public function addMember(Request $request){
         $newPlayer = new Player;
         $newPlayer->name = $request->name;
         $newPlayer->team_id = $request->team_id;
         $newPlayer->save();
         return redirect()->route('createMember');
    }
}
