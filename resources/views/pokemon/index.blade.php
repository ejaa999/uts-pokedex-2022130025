@extends('layouts.app')

@section('title', 'Daftar Pokemon')

@section('content')
    <style>
        .table th {
            background-color: #ffcc00;
            color: #2f3640;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-custom {
            background-color: #ff4757;
            color: white;
        }

        .btn-custom:hover {
            background-color: #ff6b81;
        }

        .btn-primary {
            background-color: #4c6ef5;
        }

        .btn-danger {
            background-color: #e84118;
        }
        .table-bordered {
            border: 2px solid #ffcc00;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-family: 'Arial', sans-serif;
            color: #ff4757;
            text-shadow: 1px 1px 2px #2f3640;
        }

        .btn-primary, .btn-secondary {
            border-radius: 50px;
        }

        .text-decoration-none {
            color: #4c6ef5;
        }

        .text-decoration-none:hover {
            color: #1e90ff;
        }

    </style>

    <div class="container mt-4 p-5">
        <h1 class="text-center mb-4">Daftar Pokémon</h1>
        <div class="text-center mb-4">
            <a href="{{ route('pokemon.create') }}" class="btn btn-primary btn-sm">Tambah Pokémon</a>
            <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">Kembali ke Home</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Species</th>
                        <th scope="col">Primary Type</th>
                        <th scope="col">Power</th>
                        <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pokemons as $pokemon)
                        <tr>
                            <td>{{ $loop->iteration + ($pokemons->currentPage() - 1) * $pokemons->perPage() }}</td>
                            <td>
                                <a href="{{ route('pokemon.show', $pokemon->id) }}" class="text-decoration-none">{{ $pokemon->name }}</a>
                            </td>
                            <td>{{ $pokemon->species }}</td>
                            <td>{{ $pokemon->primary_type }}</td>
                            <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('pokemon.edit', $pokemon->id) }}">Edit</a>
                                <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada Pokémon ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {!! $pokemons->links() !!}
        </div>
    </div>
@endsection
