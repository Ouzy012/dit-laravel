@extends('layouts.app')

@section('contenu')
    <h1>Modifier une demande</h1>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('demande.update', $demande->id) }}" method="POST">
        @csrf
        @method('put')

        {{-- Champs demandeur et intitule --}}
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Demandeur</label>
                    <select name="demandeur" class="form-control" aria-label="Default select example">
                        <option value="{{ $demandeur->id }}" selected>{{ $demandeur->prenom }} {{ $demandeur->nom }} -
                            {{ $demandeur->telephone }}</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->prenom }} {{ $item->nom }} -
                                {{ $item->telephone }}</option>
                        @endforeach
                    </select>
                    @error('demandeur')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Intitulé</label>
                    <input type="text" name="intitule" class="form-control" placeholder="Ex: ...."
                        value="{{ $demande->intitule }}">
                    @error('intitule')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        {{-- Champs description --}}
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="5">{{ $demande->description }}</textarea>
                    @error('description')
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
