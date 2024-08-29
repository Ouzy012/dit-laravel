@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('contenu')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">liste des Utilisateurs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Date de Naissance</th>
                            <th>Lieu de Naissance</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->prenom }}</td>
                                <td>{{ $item->nom }}</td>
                                <td>{{ $item->dateNaiss }}</td>
                                <td>{{ $item->lieuNaiss }}</td>
                                <td>{{ $item->telephone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->adresse }}</td>
                                <td>
                                    @if ($item->sexe === 'M')
                                        Masculin
                                    @else
                                        Féminin
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success">Modifier</a>
                                    <a href="#" class="btn btn-sm btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('extra-js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
