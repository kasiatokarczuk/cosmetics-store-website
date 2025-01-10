<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{

    public function index()
    {
        $opinions = Opinion::with('user')->latest()->get();
        return view('opinions.index', compact('opinions'));
    }

    public function welcome()
    {
        $opinions = Opinion::with('user')->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('opinions'));
    }

    public function dashboard()
    {
        $opinions = Opinion::with('user')->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('opinions'));
    }

    public function store(Request $request)
    {
        $request->validate(['content' => 'required']);

        $opinion = new Opinion;
        $opinion->user_id = auth()->id();
        $opinion->content = $request->input('content');
        $opinion->save();


       // Opinion::create([
       //     'user_id' => Auth::id(),
       //     'content' => $request->content
       // ]);
       //return redirect()->back()->with('success', 'Opinia została dodana!');
        return response()->json([
           'id' => $opinion->id,
           'user_name' => $opinion->user->name,
           'content' => $opinion->content
       ]);
    }
}
