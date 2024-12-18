<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
class TeamController extends Controller
{
    //
    public function index(){



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
            $teams = Team::all();
            foreach($teams as $team){
                if($team->owner_id == Auth::id()){
                    $selectedTeam = $team->owner_id;
                    return view('memberRegister')->with('selectedTeam', $selectedTeam);
                }
            }

    }
    public function addMember(Request $request){
   $validated = $request->validate([
    'name' => 'required|string|max:255',
    'team_id' => 'required|exists:teams,id', // Ensure team_id exists in the teams table
]);


$newPlayer = new Player;
$newPlayer->name = $validated['name'];
$newPlayer->team_id = $validated['team_id'];

$newPlayer->save();


return redirect()->route('createMember')->with('success', 'Player added successfully.');
        }
}
