<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    // Dashboard
    public function index()
    {

        // Salvar log
        Log::info('Carregar o dashboar.', ['action_user_id' => Auth::id()]);

        // Carregar a VIEW
        return view('dashboard.index', ['menu' => 'dashboard']);
    }
}
