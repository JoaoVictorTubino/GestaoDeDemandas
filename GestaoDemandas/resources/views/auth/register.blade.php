@extends('layouts.auth')

@section('title', 'Cadastro')

@section('content')

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required autofocus autocomplete="name">

            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">

            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="foto">Foto de Perfil</label>

            <div class="custom-file">
                <input type="file" name="foto" id="foto" class="custom-file-input" accept="image/*" required>
                <label class="custom-file-label" for="foto">
                    Escolha uma imagem
                </label>
            </div>

            @error('foto')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group mt-3">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">

            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group mt-3">
            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">

            @error('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('login') }}" class="text-sm"> Já possui conta?</a>

            <button type="submit" class="btn btn-primary">Cadastrar </button>      
         </div>
    </form>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputFile = document.querySelector('.custom-file-input');

        if (inputFile) {
            inputFile.addEventListener('change', function (e) {
                const fileName = e.target.files[0]?.name ?? 'Escolher arquivo';
                e.target.nextElementSibling.innerText = fileName;
            });
        }
    });
</script>


@endsection
