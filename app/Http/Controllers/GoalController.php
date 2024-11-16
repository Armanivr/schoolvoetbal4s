<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    //
    public function GoalAddPage(){
        $goals = Goal::all();
        return view('goalPage')->with('goals', $goals);
    }
    public function AddGoal(Goal $goal){
        // uitzoeken hoe ik goal meegeef
       return view('Addpage', ['goal' => $goal]);
    }
    public function UpdateGoal(Goal $goal, Request $request){
        $goals = Goal::all();
        $goal->score = $request->score;
        return redirect()->view('goalAdd')->with($goals);
    }
}
