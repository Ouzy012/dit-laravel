@extends('layouts.app')

@section('contenu')
    <h1>Ajouter un nouvel utilisateur</h1>

    <form action="{{route('user.store')}}" method="POST">
        @csrf

        {{-- Champs prenom et nom --}}
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Ex: Mamadou"
                        value="{{ old('prenom') }}">
                    @error('prenom')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="" placeholder="Ex: Fall"
                        value="{{ old('nom') }}">
                    @error('nom')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Champs dateNaiss et lieuNaiss --}}
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Date de naissance</label>
                    <input type="date" name="dateNaiss" class="form-control" value="{{ old('dateNaiss') }}">
                    @error('dateNaiss')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Lieu de naissance</label>
                    <input type="text" name="lieuNaiss" class="form-control" placeholder="Ex: Dakar"
                        value="{{ old('lieuNaiss') }}">
                    @error('lieuNaiss')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Champs telephone et email --}}
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" placeholder="Ex: 77XXXXXXX" value="{{ old('telephone') }}">
                    @error('telephone')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Ex: exemple@exemple.com"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Champs adresse et sexe --}}
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
                    @error('adresse')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" value="M">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Masculin
                        </label>

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" value="F">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Feminin
                        </label>
                    </div>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Champs password et confirm --}}
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Confirmation mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ml-3 mr-3">
                <button type="submit" class="btn btn-success w-100">Enregistrer</button>
            </div>
        </div>

    </form>
@endsection
