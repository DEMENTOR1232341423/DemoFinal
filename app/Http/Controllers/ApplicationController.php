<?php

namespace App\Http\Controllers;

use App\Http\Model\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function dashboard(){
        $applications = Auth::user()->applications()->orderBy('created_at','desc')->get();
        return view('dashboard',compact('applications'));
    }
    public function create(){
        return view('application.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'language' => 'required|in:Английский,Китайский,Японский',
            'cassa' => 'required',
            'sd' => 'required|date'
        ]);
        Auth::user()->applications()->create([
            'language' => $validated['language'],
            'cassa' => $validated['cassa'],
            'sd' => $validated['sd'],
            'status' => 'Новая'
        ]);
        return redirect()->route('dashboard');
    }
}
