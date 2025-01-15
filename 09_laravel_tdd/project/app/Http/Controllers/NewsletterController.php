<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribeToNewsletter(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = Auth::user();

        if (!$user || $user->email !== $request->email) {
            return response()->json([
                'status' => 'error',
                'message' => 'E-mail nie jest zalogowany lub nie pasuje do bieżącego użytkownika.',
            ], 403);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Zostałeś poprawnie zapisany do newslettera.',
        ]);
    }
}
