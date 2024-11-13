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
        $response = Http::withHeader('Authorization', env('API_KEY'))->get('http://schoolvoetbal4s.test/api/secure/matches');
        $data = $response->json();
        foreach($data as $match){
        dd($match);
        }
    }
}
