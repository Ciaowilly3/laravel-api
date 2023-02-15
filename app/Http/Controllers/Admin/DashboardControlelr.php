<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    public function home() {
        // l'utente loggato
        $user = Auth::user();

        // Lista di tutti gli utenti nel db
        if ($user->role === "admin") {
            $users = User::all();
        }

        return view("admin.dashboard", [
            // "users" => isset($users) ? $users : null
            "users" => $users ?? null
        ]);

        /*   if ($user->email === "mario.rossi@gmail.com") {
            return "Bevneuto mario rossi";
        } else {
            return "Ecco la pagina home di un utente loggato";
        } */
    }
}