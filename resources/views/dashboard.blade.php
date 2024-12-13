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

        /* Botões customizados */
        .custom-prev,
        .custom-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5); /* Fundo semitransparente */
            color: #fff; /* Cor do ícone */
            border: none;
            border-radius: 50%;
            height: 50px; /* Tamanho do botão */
            width: 50px;
            cursor: pointer;
            z-index: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .custom-prev {
            left: -60px; /* Ajusta a distância para fora do carrossel */
        }

        .custom-next {
            right: -60px; /* Ajusta a distância para fora do carrossel */
        }

        .custom-prev:hover,
        .custom-next:hover {
            background-color: rgba(0, 0, 0, 0.8);
            transform: translateY(-50%) scale(1.1);
        }

        /* Ícones */
        .custom-prev svg,
        .custom-next svg {
            width: 20px;
            height: 20px;
            fill: #fff;
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

                <!-- Botões customizados -->
                <button class="custom-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z" />
                    </svg>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="custom-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M10 6l-1.41 1.41L13.17 12l-4.58 4.59L10 18l6-6z" />
                    </svg>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
@endsection
