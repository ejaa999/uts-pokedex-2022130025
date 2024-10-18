@extends('layouts.app')

@section('title', 'Detail Pokemon')

@section('content')
    <style>
        .card {
            background-color: #ffcc00;
            border-radius: 10px;
            border: 2px solid #ffcc00;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-family: 'Arial', sans-serif;
            color: #ff4757;
            font-size: 1.5rem;
        }

        .badge {
            text-transform: capitalize;
            background-color: #4c6ef5;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .badge:hover {
            background-color: #3867d6;
        }

        .btn-danger {
            background-color: #e84118;
            border-color: #e84118;
            border-radius: 25px;
        }

        .btn-danger:hover {
            background-color: #c23616;
            border-color: #c23616;
        }

        .container {
            background-color: #a3abf1;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #ff4757;
            text-align: center;
            text-transform: uppercase;
        }
    </style>

    <div class="container mt-5">
        <h2 class="mb-4">Detail Pokémon</h2>

        <div class="card mb-3 shadow-sm">
            <div class="row g-0">
                @if ($pokemon->photo)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $pokemon->photo) }}" class="img-fluid rounded-start" alt="{{ $pokemon->name }}" style="object-fit: cover; height: 100%; width: 100%;">
                    </div>
                @else
                    <div class="col-md-4">
                        <img src="{{ asset('storage/default_pokemon.png') }}" class="img-fluid rounded-start" alt="Default Pokémon" style="object-fit: cover; height: 100%; width: 100%;">
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pokemon->name }} ({{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }})</h5>
                        <p class="card-text"><strong>Species:</strong> {{ $pokemon->species }}</p>
                        <p class="card-text"><strong>Primary Type:</strong> <span class="badge">{{ $pokemon->primary_type }}</span></p>
                        <p class="card-text"><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
                        <p class="card-text"><strong>Height:</strong> {{ $pokemon->height }} m</p>
                        <p class="card-text"><strong>HP:</strong> {{ $pokemon->hp }}</p>
                        <p class="card-text"><strong>Attack:</strong> {{ $pokemon->attack }}</p>
                        <p class="card-text"><strong>Defense:</strong> {{ $pokemon->defense }}</p>
                        <p class="card-text"><strong>Total Power:</strong> {{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</p>
                        <p class="card-text"><strong>Is Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                        <a href="{{ route('pokemon.index') }}" class="btn btn-danger mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
