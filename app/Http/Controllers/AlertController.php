<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $alerts = $user->alerts()->where('is_read', false)->orderBy('created_at', 'desc')->get();

        return response()->json($alerts);
    }

    public function markRead(Request $request, Alert $alert)
    {
        if ($alert->user_id !== $request->user()->id) {
            abort(403);
        }

        $alert->update(['is_read' => true]);

        return response()->json(['ok' => true]);
    }
}
