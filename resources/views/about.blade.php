@extends('layouts.app')

@section('title', 'Sobre')

@section('style')
    <style>
        .img-fluid-custom {
            width: 100%;
            height: auto;
        }

        .img-round {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .card-custom {
            border: 1px solid #ddd;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .subtitle {
            font-size: 1.2rem;
            color: gray;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="container py-5">
            <div class="row">
                <!-- Primeira Coluna (Maior) -->
                <div class="col-lg-8">
                    <h1 class="title">Sobre Nossa Empresa</h1>
                    <p>
                        Nossa empresa tem o compromisso de fornecer os melhores serviços e produtos aos nossos clientes. Com mais de 20 anos de experiência, nossa missão é oferecer soluções inovadoras e de alta qualidade, sempre com foco nas necessidades dos nossos usuários.
                    </p>
                    <img src="https://via.placeholder.com/800x400" alt="Imagem sobre a empresa" class="img-fluid-custom">
                </div>
        
                <!-- Segunda Coluna (Menor) -->
                <div class="col-lg-4">
                    <div class="card card-custom">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/80" alt="Foto de perfil" class="img-round">
                            <div class="ms-3">
                                <h4 class="title mb-1">João Silva</h4>
                                <p class="subtitle mb-0">CEO e Fundador</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>
@endsection