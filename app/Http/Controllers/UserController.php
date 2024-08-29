<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //La requête qui listes les utilisateurs
        //select * from users;
        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'dateNaiss' => 'required|date|before:' . (Str::substr(now()->toDateString(), 0, 4) - 18) . '-12-31',
            'lieuNaiss' => 'required',
            'telephone' => 'required|size:9|starts_with:70,75,76,77,78|unique:users,telephone',
            'email' => 'required|email|unique:users,email',
            'adresse' => 'required',
            'sexe' => 'required|in:M,F',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'prenom' => Str::ucfirst($request->prenom),
            'nom' => Str::upper($request->nom),
            'dateNaiss' => $request->dateNaiss,
            'lieuNaiss' => $request->lieuNaiss,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'sexe' => $request->sexe,
            'password' => Hash::make($request->password), //bcrypt($request->password)
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
