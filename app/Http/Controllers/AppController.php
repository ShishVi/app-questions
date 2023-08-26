<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        return view('main.index', [
            'questions' => Question::all(),
        ]);
    }
}
