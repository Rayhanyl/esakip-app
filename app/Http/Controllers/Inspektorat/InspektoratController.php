<?php

namespace App\Http\Controllers\Inspektorat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InspektoratController extends Controller
{
    public function index()
    {
        return view('inspektorat.index');
    }

    public function selfAssessment()
    {
        return view('inspektorat.self_assessment');
    }
}
