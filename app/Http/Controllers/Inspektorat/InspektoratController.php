<?php

namespace App\Http\Controllers\Inspektorat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InspektoratController extends Controller
{
    public function index(){
        return view('inspektorat.index');
    }
}
