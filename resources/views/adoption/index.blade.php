@extends('layouts.form')

@section('title', 'Controle de Solicitações')

@section('url')
    {{ url('/dashboard') }}
@endsection
    
@section('style')
    <style>
        /* Card principal */
        .main-card {
            width: 100%;
            max-height: 70vh;
            margin: 30px auto;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Card dentro do card principal (card secundário) */
        .nested-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #f9f9f9;
        }

        /* Efeito de elevação no hover */
        .nested-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Título do card principal */
        .main-card h5 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Card secundário (nested-card) layout */
        .nested-card .text {
            display: flex;
            flex-direction: column;
        }

        .nested-card h6 {
            margin-bottom: 5px;
            font-size: 1.1rem;
            color: #333;
        }

        .nested-card p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }

        /* Responsividade para grid de cards */
        .row-cols-md-3 .col {
            padding: 10px;
        }

        .nested-card .actions button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .nested-card .actions svg {
            width: 25px;
            height: 25px;
            fill: #333;
            margin: 0 5px;
            cursor: pointer;
        }

        .nested-card .actions svg:hover {
            fill: #007bff;  /* Muda a cor para azul quando passa o mouse */
        }

        .fixed-button {
            position: fixed;
            top: 20px;    /* Distância do topo */
            right: 20px;  /* Distância da direita */
            z-index: 1000; /* Garantir que o botão fique por cima de outros elementos */
        }

        .fixed-button button {
            padding: 10px 15px; /* Ajuste o tamanho do botão se necessário */
        }
    </style>
@endsection

@section('content')

    <div class="fixed-button">
        <form action="#" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-primary">Gerar Relatorio</button>
        </form>
    </div>

    <section style="margin-top: 10%; margin-bottom: 10%;">
        <!-- Card Principal -->
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="main-card">
                    <h5>Solicitações de Adoção</h5>
        
                    <!-- Lista de Cards organizados em Grid (colunas) -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        @if ($adoptions->isNotEmpty())
                            @foreach ($adoptions as $adoption)
                                <!-- Card -->
                                <div class="col">
                                    <a href="#" class="link-underline link-underline-opacity-0">
                                        <div class="nested-card">
                                            <div class="d-flex justify-content-between">
                                                <div class="text">
                                                    <h6>{{ $adoption->status }}</h6>
                                                    <p>{{ $adoption->adoption_date }}</p>
                                                    <p>{{ $adoption->user->name }} - {{ $adoption->pet->name }}</p>
                                                </div>
                                                <div class="actions my-auto">
                                                    <form action="{{ url('/adoption/update/'.$adoption->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="Approved">
                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#000000"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                                        </button>
                                                    </form>
                                                    <form action="{{ url('/adoption/update/'.$adoption->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="Denied">
                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#000000"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"/></svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p><b>Sem solicitações agora</b></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
