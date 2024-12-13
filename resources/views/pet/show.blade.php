@extends('layouts.form')

@section('title', 'Informações')

@section('url')
    {{ url('/pet') }}
@endsection

@section('style')
    <style>
        .info-card {
            display: flex;
            gap: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }

        .info-photo {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .info-photo img {
            width: 50vh;
            height: 50vh;
            border-radius: 50%;
            object-fit: cover;
        }

        .info-details {
            flex: 1;
            padding: 20px;
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .info-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .info-value {
            margin-top: 5px;
            color: #6c757d;
            font-size: 1rem;
        }

        .edit-btn {
            padding: 5px 10px;
        }

        #btn-relative {
            position: absolute;
            top: 3vh; /* Ajuste a distância do topo conforme necessário */
            left: 5vh; /* Ajuste a distância da borda direita conforme necessário */
            z-index: 10; /* Garantir que o botão fique acima da imagem */
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
    @auth   
        @if (Auth::user()->type == 'admin')
            <div class="fixed-button">
                <form action="{{url('/pet/delete/'.$pet->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Deletar</button>
                </form>
            </div>
        @else
            <div class="fixed-button">
                <form action="#" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary-danger">Adotar</button>
                </form>
            </div>
        @endif
    @endauth

    <section style="margin-top: 10%; margin-bottom: 10%;">
        <div class="container position-relative">
            <!-- Card de Informações -->
            <div class="info-card">
                <!-- Coluna da Foto -->
                <div class="info-photo">
                    @auth
                        @if (Auth::user()->type == 'admin')
                            <button id="btn-relative" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editModal-image"
                                data-field="image" data-value="{{ $pet->image }}">{{ __('Editar') }}</button>
                        @endif
                    @endauth
                    <img src="{{ $pet->image }}" alt="Foto do Pet">
                </div>

                <!-- Coluna de Detalhes -->
                <div class="info-details">
                    @foreach ([
                        'name' => 'Nome',
                        'age' => 'Idade',
                        'breed' => 'Raça',
                        'description' => 'Descrição',
                        'health_status' => 'Estado de Saúde',
                        'size' => 'Tamanho',
                        'gender' => 'Gênero',
                        'available_for_adoption' => 'Disponível para Adoção',
                    ] as $field => $label)
                        <div class="info-row">
                            <div>
                                <span class="info-title">{{ $label }}</span>
                                <div class="info-value w-75" id="value-{{ $field }}">
                                    @switch($field)
                                        @case('available_for_adoption')
                                            {{ $pet->$field === 'true' ? 'Sim' : ($pet->$field === 'false' ? 'Não' : ($pet->$field ?? 'Não informado')) }}
                                            @break
                                        @case('gender')
                                            {{ $pet->$field == 'Male' ? 'Macho' : ($pet->$field == 'Female' ? 'Fêmea' : ($pet->$field ?? 'Não informado')) }}
                                            @break
                                        @case('size')
                                            {{ $pet->$field == 'Small' ? 'Pequeno' : ($pet->$field == 'Medium' ? 'Médio' : ($pet->$field == 'Large' ? 'Grande' : ($pet->$field ?? 'Não informado'))) }}
                                            @break
                                        @default
                                            {{ $pet->$field ?? 'Não informado' }}
                                    @endswitch
                                </div>
                            </div>
                            @auth
                                @if (Auth::user()->type == 'admin')
                                    <button class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $field }}"
                                        data-field="{{ $field }}" data-value="{{ $pet->$field }}">{{ __('Editar') }}</button>
                                @endif
                            @endauth
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @auth
        @if (Auth::user()->type == 'admin')
            <!-- Modal para a edição -->
            @foreach ([
                'image' => 'Imagem',
                'name' => 'Nome',
                'age' => 'Idade',
                'breed' => 'Raça',
                'description' => 'Descrição',
                'health_status' => 'Estado de Saúde',
                'size' => 'Tamanho',
                'gender' => 'Gênero',
                'available_for_adoption' => 'Disponível para Adoção',
            ] as $field => $label)
                <div class="modal fade" id="editModal-{{ $field }}" tabindex="-1"
                    aria-labelledby="editModalLabel-{{ $field }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ url('/pet/update/' . $pet->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-{{ $field }}">Editar {{ $label }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        @switch($field)
                                            @case('size')
                                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                                <select id="{{ $field }}" name="{{ $field }}" class="form-select">
                                                    <option selected disabled>{{ $pet->$field == 'Small' ? 'Pequeno' : ($pet->$field == 'Medium' ? 'Médio' : 'Grande') }}</option>
                                                    <option value="Small">Pequeno</option>
                                                    <option value="Medium">Médio</option>
                                                    <option value="Large">Grande</option>
                                                </select>
                                                @break
                                            @case('gender')
                                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                                <select id="{{ $field }}" name="{{ $field }}" class="form-select">
                                                    <option selected disabled>{{ $pet->$field == 'Male' ? 'Macho' : 'Fêmea' }}</option>
                                                    <option value="Male">Macho</option>
                                                    <option value="Female">Fêmea</option>
                                                </select>
                                                @break
                                            @case('available_for_adoption')
                                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                                <select id="{{ $field }}" name="{{ $field }}" class="form-select">
                                                    <option selected disabled>{{ $pet->$field === 'true' ? 'Sim' : 'Não' }}</option>
                                                    <option value="true">Sim</option>
                                                    <option value="false">Não</option>
                                                </select>
                                                @break
                                            @default
                                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                                <input type="{{ $field == 'age' ? 'number' : 'text' }}" class="form-control" id="{{ $field }}"
                                                    name="{{ $field }}" value="{{ $pet->$field }}" required>     
                                        @endswitch
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    @endauth
@endsection

@section('script')
    <script>
        // Exemplo de script se necessário adicionar lógica aos modais
        document.addEventListener('DOMContentLoaded', function () {
            const modals = document.querySelectorAll('.edit-btn');
            modals.forEach(modal => {
                modal.addEventListener('click', function () {
                    const field = this.getAttribute('data-field');
                    const value = this.getAttribute('data-value');
                    document.querySelector(`#editModal-${field} input[name="${field}"]`).value = value;
                });
            });
        });
    </script>
@endsection