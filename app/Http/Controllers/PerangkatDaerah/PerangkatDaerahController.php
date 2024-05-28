<?php

namespace App\Http\Controllers\PerangkatDaerah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerangkatDaerahController extends Controller
{
    public function index(){
        return view('perda.index');
    }
}
