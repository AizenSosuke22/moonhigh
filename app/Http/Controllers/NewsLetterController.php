<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;

class NewsLetterController extends Controller
{
    public function index(){
        $data = NewsLetter::all();
        return view('admin.newsletter.list', compact('data'));
    }

    public function store(Request $request){
        $find = NewsLetter::where('email', $request->email)->first();
        if(!$find){
            NewsLetter::create([
                'email' => $request->email
            ]);
        }
        return back();
    }
}