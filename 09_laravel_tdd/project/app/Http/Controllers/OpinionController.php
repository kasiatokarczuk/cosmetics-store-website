<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class OpinionController extends Controller
{
    public function index(): View
    {
        $opinions = Opinion::with('user')->latest()->get();
        return view('opinions.index', compact('opinions'));
    }

    public function welcome(): View
    {
        $opinions = Opinion::with('user')->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('opinions'));
    }

    public function dashboard(): View
    {
        $opinions = Opinion::with('user')->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('opinions'));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate(['content' => 'required|string']);

        $opinion = new Opinion();
        if (!auth()->check()) {
            throw new \LogicException('Nie zalogowano użytkownika');
        }
        $opinion->user_id = (int) auth()->id();
        /** @var string $content */
        $content = $request->input('content');
        $opinion->content = $content;
        $opinion->save();

        // Add the type hinting to resolve the property issue
        /** @var User|null $user */
        $user = $opinion->user;  // This ensures the `$user` variable is treated as a User model instance.

        // Check if user exists and retrieve the name
        $user_name = $user ? $user->name : 'Unknown User';

        return response()->json([
            'id' => $opinion->id,
            'user_name' => $user_name,
            'content' => $opinion->content
        ]);
    }
}
