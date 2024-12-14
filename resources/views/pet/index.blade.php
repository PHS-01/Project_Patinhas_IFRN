@extends('layouts.app')

@section('title', 'Lista')

@section('style')
    <style>
        /* Estilo personalizado para os cards */
        .card-custom {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .card-image {
            height: 200px; /* Altura fixa do contêiner */
            width: 100%; /* Largura total do contêiner */
            object-fit: cover; /* Garante que a imagem preencha o espaço sem distorção */
            object-position: center; /* Centraliza a imagem dentro do contêiner */
        }

        .card-body {
            padding: 15px;
        }

        .title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .subtitle {
            font-size: 1.2rem;
            color: gray;
        }

        /* Estilo para o menu (checkboxes) */
        .menu-checkbox {
            padding: 20px;
            border-right: 1px solid #ddd;
            height: 100%;
            position: sticky;
            top: 0;
        }

        .menu-checkbox input {
            margin-right: 10px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .menu-checkbox {
                padding: 10px;
            }
        }
    </style>    
@endsection

@section('content')
    <section class="mb-5">
        <div class="container-fluid py-5">
            <div class="row">
                <!-- Primeira Coluna (Menor) - Menu com Checkboxes -->
                <div class="col-lg-2 col-md-3 col-11 menu-checkbox">
                    {{-- <h3>Filtros</h3>
                    <form>
                        <div class="mb-3">
                            <input type="checkbox" id="option1" value="option1">
                            <label for="option1">Opção 1</label>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" id="option2" value="option2">
                            <label for="option2">Opção 2</label>
                        </div>
                    </form> --}}
                </div>
        
                <!-- Segunda Coluna (Maior) - Grid com Cards -->
                <div class="col-lg-10 col-md-9 col-13">
                    <div class="row g-4">
                        @foreach ($pets as $pet)
                            <!-- Card -->
                            <div class="col-md-3 col-11">
                                <div class="card card-custom">
                                    <a href="{{ url('/pet/show/'.$pet->id) }}" class="link-underline link-underline-opacity-0">
                                        <img src="{{ $pet->image }}" class="card-image" alt="Imagem Pet">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="title">{{ $pet->name }}</h5>
                                        <p class="subtitle">{{ $pet->gender }}</p>
                                        <a href="{{ url('/pet/show/'.$pet->id) }}" class="btn btn-outline-primary">Informações</a>
                                        @auth
                                            @if (Auth::user()->type == 'admin')
                                                
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection