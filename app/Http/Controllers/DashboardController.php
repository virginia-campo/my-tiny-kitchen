<?php

namespace App\Http\Controllers;
use App\Enums\UserRole;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) // BECAUSE THEY ONLY HAVE ONE ACTION
    {
        $user = $request->user();

        return match ($user->role) {
            UserRole::ADMIN => view('dashboard.admin'),
            UserRole::CHEF  => view('dashboard.chef'),
            UserRole::COOK  => view('dashboard.cook'),
        };

        /*
        OTRA OPCIÓN ES HACER UN RECIRECT PERO ESTO CAMBIA LA URL
        return match ($user->role) {
            UserRole::ADMIN => redirect()->route('admin.dashboard'),
            UserRole::CHEF  => redirect()->route('chef.dashboard'),
            UserRole::COOK  => redirect()->route('cook.dashboard'),
        };
         */
    }
}
