<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from users, demandes where demandes.user_id = users.id;
        $demandes = DB::table('users')
            ->join('demandes', 'demandes.user_id', '=', 'users.id')
            ->get([
                'demandes.created_at',
                'users.prenom',
                'users.nom',
                'users.telephone',
                'demandes.id',
                'demandes.intitule',
                'demandes.description'
            ]);
        return view('pages.demande.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('pages.demande.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'demandeur' => 'required|exists:users,id',
            'intitule' => 'required|min:6',
            'description' => 'required'
        ]);

        $demande = new Demande;
        $demande->user_id = $request->demandeur;
        $demande->intitule = $request->intitule;
        $demande->description = $request->description;
        $demande->save();

        if ($demande) {
            return redirect()->route('demande.index')->with('success', "Demande ajouter avec succès");
        }
        return back()->with('error', "Une erreur s'est produite");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::all();
        $demande = Demande::find($id);
        $demandeur = User::find($demande->user_id);
        return view('pages.demande.show', compact('demande', 'users', 'demandeur'));
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
        $request->validate([
            'demandeur' => 'required|exists:users,id',
            'intitule' => 'required|min:6',
            'description' => 'required'
        ]);

        $demande = Demande::find($id);
        if ($demande) {
            $demande->update([
                'user_id' => $request->demandeur,
                'intitule' => $request->intitule,
                'description' => $request->description
            ]);
            return redirect()->route('demande.index')->with('success', "Demande modifier avec succès");
        }
        return back()->with('error', "Demande introuvable");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $demande = Demande::find($id);
        if ($demande) {
            $demande->delete();
            return redirect()->route('demande.index')->with('success', "Demande supprimée avec succès");
        }
        return redirect()->route('demande.index')->with('error', "Demande introuvable");
    }
}
