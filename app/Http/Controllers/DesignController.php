<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignController extends Controller
{
    public function index(){

        return view('admin.design-app', [
            'question' => Question::all()->first(),
        ]);
    }

    public function changePaddingTop($px){       

        DB::table('questions')->update(['padding_top' => $px]);      

        return back();
    }

    public function changePaddingBottom($px){       

        DB::table('questions')->update(['padding_bottom' => $px]);      

        return back();
    }
}
