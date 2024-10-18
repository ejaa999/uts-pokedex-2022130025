@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #ffcc00;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 220px;
            object-fit: contain;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            background-color: #ffffff;
        }

        .card-text {
            margin-bottom: 0.5rem;
        }

        .text-primary {
            color: #4c6ef5;
        }

        .text-muted {
            color: #6c757d;
        }

        .pagination {
            margin-top: 20px; 
        }
    </style>

    <div class="container mt-5">
        <img src="{{ asset('storage/logopikachu.png') }}" alt="Pokedex" class="mb-4 d-block mx-auto" width="200" height="200">
        <h2 class="text-center font-weight-bold">Pokedex</h2>
        <div class="row">
            @forelse ($pokemons as $pokemon)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if ($pokemon->photo)
                            <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top" alt="{{ $pokemon->name }}">
                        @else
                            <img src="{{ asset('storage/default_pokemon.png') }}" class="card-img-top" alt="Default Pokemon">
                        @endif
                        <div class="card-body text-center">
                            <p class="card-text">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                            <a href="{{ route('pokemon.show', $pokemon->id) }}" class="text-decoration-none text-primary fw-bold">
                                {{ $pokemon->name }}
                            </a>
                            <p class="card-text text-muted">{{ $pokemon->primary_type }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No Pokémon found.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $pokemons->links() }}
        </div>
    </div>
@endsection
