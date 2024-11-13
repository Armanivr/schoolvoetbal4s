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
    public function getData(){
        $response = Http::get('http://schoolvoetbal4s.test/api/matches');
        $data = $response->json();
        dd($data);
    }
}
