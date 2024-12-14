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
                    <h1 class="title">Sobre o Patinhas do IFRN</h1>
                    <p>O Patinhas do IFRN é um projeto dedicado a transformar a vida de cães de rua no campus do IFRN em Caicó. Nossa missão é criar um espaço seguro para registrar, divulgar e promover a adoção responsável desses animais, conectando-os a lares amorosos. Acreditamos no poder da comunidade para cuidar, proteger e oferecer uma nova chance a esses amigos de quatro patas. Junte-se a nós nessa causa e ajude a fazer a diferença!</p>
                    <img src="{{ asset('images/barnes/barne1.jpeg') }}" alt="Imagem sobre a empresa" class="img-fluid-custom">
                </div>
        
                <!-- Segunda Coluna (Menor) -->
                <div class="col-lg-4">
                    <div class="card card-custom mb-2">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/devs/dev1.jpeg') }}" alt="Foto de perfil" class="img-round">
                            <div class="ms-3">
                                <h4 class="title mb-1">Willy Renner</h4>
                                <p class="subtitle mb-0">Desenvolvedor</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom mb-2">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/devs/dev2.jpeg') }}" alt="Foto de perfil" class="img-round">
                            <div class="ms-3">
                                <h4 class="title mb-1"> Mikarla Oliveira</h4>
                                <p class="subtitle mb-0">Design</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom mb-2">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/devs/dev3.jpeg') }}" alt="Foto de perfil" class="img-round">
                            <div class="ms-3">
                                <h4 class="title mb-1">David Silva</h4>
                                <p class="subtitle mb-0">Desenvolvedor</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom mb-2">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/devs/dev4.jpeg') }}" alt="Foto de perfil" class="img-round">
                            <div class="ms-3">
                                <h4 class="title mb-1">Pedro de Oliveira</h4>
                                <p class="subtitle mb-0">Design e Beta-Teste</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom mb-2">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/devs/dev5.jpeg') }}" alt="Foto de perfil" class="img-round">
                            <div class="ms-3">
                                <h4 class="title mb-1">Luanderson</h4>
                                <p class="subtitle mb-0">Desenvolvedor</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom mb-2">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/devs/dev6.webp') }}" alt="Foto de perfil" class="img-round">
                            <div class="ms-3">
                                <h4 class="title mb-1">Anna Clores</h4>
                                <p class="subtitle mb-0">Design</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>
@endsection