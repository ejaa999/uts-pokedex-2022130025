@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #e7f3ff;
        }

        .container {
            max-width: 1200px;
        }

        h2 {
            color: #ff4757;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .card {
            border-radius: 10px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            color: #ff4757;
            font-weight: bold;
        }

        .badge {
            background-color: #4c6ef5;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .no-pokemon {
            color: #ff4757;
            font-weight: bold; 
        }
    </style>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Pokedex</h2>
        <div class="row">
            @forelse ($pokemons as $pokemon)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($pokemon->photo)
                            <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top" alt="{{ $pokemon->name }}">
                        @else
                            <img src="{{ asset('storage/default_pokemon.png') }}" class="card-img-top" alt="Default Pokémon">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $pokemon->name }}</h5>
                            <p class="card-text">ID: <strong>{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</strong></p>
                            <p class="card-text">Type: <span class="badge">{{ $pokemon->primary_type }}</span></p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="no-pokemon">No Pokémon found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
