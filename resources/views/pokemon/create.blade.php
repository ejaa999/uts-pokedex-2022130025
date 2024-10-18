@extends('layouts.app')

@section('title', 'Tambah Pokemon')

@section('content')
    <div class="container mt-5 p-4 rounded" style="background: linear-gradient(135deg, #FFCB05, #3B4CCA);">
        <h2 class="text-center mb-4" style="font-family: 'Pokemon Solid', sans-serif; color: #FFFFFF;">
            Tambah Pokémon
        </h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 15px;">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label" style="font-weight: bold; color: #3B4CCA;">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required style="border: 2px solid #FFCB05;">
            </div>
            <div class="mb-3">
                <label for="species" class="form-label" style="font-weight: bold; color: #3B4CCA;">Species</label>
                <input type="text" class="form-control" id="species" name="species" value="{{ old('species') }}" required style="border: 2px solid #FFCB05;">
            </div>
            <div class="mb-3">
                <label for="primary_type" class="form-label" style="font-weight: bold; color: #3B4CCA;">Primary Type</label>
                <select class="form-select" id="primary_type" name="primary_type" required style="border: 2px solid #FFCB05;">
                    <option selected disabled>Pilih Primary Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type }}" {{ old('primary_type') == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label" style="font-weight: bold; color: #3B4CCA;">Weight</label>
                <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ old('weight', 0) }}" style="border: 2px solid #FFCB05;">
            </div>
            <div class="mb-3">
                <label for="height" class="form-label" style="font-weight: bold; color: #3B4CCA;">Height</label>
                <input type="number" step="0.01" class="form-control" id="height" name="height" value="{{ old('height', 0) }}" style="border: 2px solid #FFCB05;">
            </div>
            <div class="mb-3">
                <label for="hp" class="form-label" style="font-weight: bold; color: #3B4CCA;">HP</label>
                <input type="number" class="form-control" id="hp" name="hp" value="{{ old('hp', 0) }}" style="border: 2px solid #FFCB05;">
            </div>
            <div class="mb-3">
                <label for="attack" class="form-label" style="font-weight: bold; color: #3B4CCA;">Attack</label>
                <input type="number" class="form-control" id="attack" name="attack" value="{{ old('attack', 0) }}" style="border: 2px solid #FFCB05;">
            </div>
            <div class="mb-3">
                <label for="defense" class="form-label" style="font-weight: bold; color: #3B4CCA;">Defense</label>
                <input type="number" class="form-control" id="defense" name="defense" value="{{ old('defense', 0) }}" style="border: 2px solid #FFCB05;">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_legendary" name="is_legendary" value="1" {{ old('is_legendary') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_legendary" style="font-weight: bold; color: #3B4CCA;">Is Legendary</label>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label" style="font-weight: bold; color: #3B4CCA;">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" style="border: 2px solid #FFCB05;">
            </div>
            <button type="submit" class="btn btn-warning w-100" style="font-weight: bold; font-size: 16px;">Tambah</button>
            <a href="{{ route('pokemon.index') }}" class="btn btn-secondary w-100 mt-2" style="font-size: 16px;">Kembali</a>
        </form>
    </div>
@endsection
