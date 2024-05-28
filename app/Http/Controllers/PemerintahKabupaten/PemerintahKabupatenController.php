<?php

namespace App\Http\Controllers\PemerintahKabupaten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemerintahKabupatenController extends Controller
{
    public function index(){
        return view('pemkab.index');
    }
}
