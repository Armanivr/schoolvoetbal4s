<?php

namespace App\Http\Controllers;

use App\Models\Matcch;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function myMatches(){
        $matches = Matcch::all();
        return response()->json($matches);
    }
}
