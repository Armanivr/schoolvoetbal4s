<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Tournament;

class TeamController extends Controller
{
    //
    public function index(){



    }

        public function create()
        {
            $tournaments = Tournament::all(); // Retrieve all tournaments from the database
            return view('teamRegister', compact('tournaments'));
        }
    public function addTeams(Request $request)
    {
        

        return redirect()->route('createTeam');

    }
        public function createMember(){
            // $teams = Team::all();
            // foreach($teams as $team){
            //     if($team->owner_id == Auth::id()){
                   // $selectedTeam = $team->owner_id;
                   $selectedTeam = Team::where('owner_id', Auth::id())->first();
                    return view('memberRegister')->with('selectedTeam', $selectedTeam);
                // }
            }


    public function addMember(Request $request){
   //     $team = Team::find($request->team_id);
        $selectedTeam = Team::where('owner_id', Auth::id())->first();
        $newPlayer = new Player();
        $newPlayer->name = $request->name;
        $newPlayer->team_id = $selectedTeam->id;
        $newPlayer->save();
if ($newPlayer->save()) {
    return redirect()->route('createMember')->with('success', 'Player added successfully.');
} else {
    return redirect()->route('createMember')->with('error', 'Failed to add player. Please try again.');
}
        }
    }
