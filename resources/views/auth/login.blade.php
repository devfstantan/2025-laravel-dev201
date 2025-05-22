@extends('layout')
@section('title', 'Connexion')

@section('content')
    <h1>Connexion</h1>

    <form action="{{ route('auth.login.store') }}" method="POST">
        @csrf
        {{-- Email --}}
        <div>
            <label for="email">Adresse Email</label>
            <input type="email" name="email" id="email" placeholder="nom.prenom@mail.com" value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- password --}}
        <div>
            <label for="email">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Saisir votre mot de passe">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <input type="submit" value="Se Connecter">

        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
    </form>
@endsection
