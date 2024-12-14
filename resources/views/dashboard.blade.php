@extends('layouts.app')

@section('title', 'Dashboard')

@section('style')
    <style>
        /* Estilo base do carrossel */
        .custom-carousel {
            position: relative;
            max-width: 60%;
            margin: 0 auto;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Adiciona sombra ao carrossel */
            border-radius: 8px; /* Canto levemente arredondado */
            overflow: hidden; /* Impede que partes de imagens saiam da borda */
            transition: box-shadow 0.3s ease; /* Transição suave ao passar o mouse */
        }

        .custom-carousel:hover {
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3); /* Intensifica a sombra ao passar o mouse */
        }

        .carousel-inner img {
            transition: transform 0.3s ease; /* Animação para a elevação */
        }

        .carousel-inner img:hover {
            transform: scale(1.05); /* Eleva levemente a imagem ao passar o mouse */
        }

        /* Card com efeito de elevação */
        .card-hover {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efeito de hover para elevação */
        .card-hover:hover {
            transform: translateY(-5px);  /* Eleva o card */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);  /* Mais sombra */
        }

        /* Definindo a altura do card para garantir que ele não ultrapasse o layout */
        .card {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-radius: 8px;
        }

        /* Ajuste para que a rolagem seja feita dentro do alerta */
        .floating-alert.visible {
            transform: translateY(0);
            opacity: 1;
        }

        /* Esconde o alerta se não for visível */
        .floating-alert.hidden {
            pointer-events: none;
        }

        /* Texto dentro do card */
        .card .text {
            flex: 1;
        }

        /* Estilo dos ícones no card */
        .card .actions svg {
            width: 24px;
            height: 24px;
            fill: #333;
            margin: 0 5px;
            cursor: pointer;
        }

        .card .actions svg:hover {
            fill: #007bff;  /* Muda a cor para azul quando passa o mouse */
        }

        /* Estilos do título e subtítulo do card */
        .card .card-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .card .card-subtitle {
            font-size: 0.9rem;
            color: #777;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="custom-carousel my-5">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <!-- Imagens do Carrossel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/600x300?text=Image+1" class="d-block w-100" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/600x300?text=Image+2" class="d-block w-100" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/600x300?text=Image+3" class="d-block w-100" alt="Image 3">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('alert-menu')
    @if ($adoptions->isNotEmpty())
        @foreach ($adoptions as $adoption)
            <!-- Card -->
            <a href="#" class="card d-flex flex-row align-items-center card-hover mb-3 link-underline link-underline-opacity-0">
                <div class="text p-3">
                    <h4 class="card-title">{{ $adoption->user->name }}</h4>
                    <p class="card-subtitle">{{ $adoption->adoption_date }}</p>
                </div>
                <div class="actions d-flex p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#000000"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#000000"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"/></svg>
                </div>
            </a>
        @endforeach
    @else
        <p><b>Sem solicitações agora</b></p>
    @endif
@endsection