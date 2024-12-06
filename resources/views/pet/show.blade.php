@extends('layouts.app')

@section('title', 'Informações')

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
    </style>
@endsection

@section('content')
    <section>
        <div class="container my-5 position-relative">
            <!-- Card de Informações -->
            <div class="info-card">
                <!-- Coluna da Foto -->
                <div class="info-photo">
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
                                <div class="info-value" id="value-{{ $field }}">
                                    {{ $pet->$field ?? 'Não informado' }}
                                </div>
                            </div>
                            <button class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
                                data-field="{{ $field }}" data-value="{{ $pet->$field }}">{{ __('Editar') }}</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Edição -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Informação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{ url('/pet/update/'.$pet->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label id="editLabel" for="editInput" class="form-label"></label>

                            <!-- Input de texto padrão -->
                            <input type="text" class="form-control d-none" id="editInput" name="value">

                            <!-- Select para opções predefinidas -->
                            <select class="form-select d-none" id="editSelect" name="value">
                                <!-- Opções dinâmicas preenchidas via JavaScript -->
                            </select>

                            <input type="hidden" id="editField" name="field">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" form="editForm">Salvar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const field = button.getAttribute('data-field');
            const currentValue = button.getAttribute('data-value');
            const label = button.parentElement.querySelector('.info-title').innerText;

            const modalLabel = editModal.querySelector('#editLabel');
            const modalInput = editModal.querySelector('#editInput');
            const modalSelect = editModal.querySelector('#editSelect');
            const modalField = editModal.querySelector('#editField');

            modalLabel.textContent = label;
            modalField.value = field;

            // Configurações específicas para campos de seleção
            if (field === 'size') {
                modalInput.classList.add('d-none');
                modalSelect.classList.remove('d-none');
                modalSelect.innerHTML = `
                    <option value="Small" ${currentValue === 'Small' ? 'selected' : ''}>Pequeno</option>
                    <option value="Medium" ${currentValue === 'Medium' ? 'selected' : ''}>Médio</option>
                    <option value="Large" ${currentValue === 'Large' ? 'selected' : ''}>Grande</option>
                `;
            } else if (field === 'gender') {
                modalInput.classList.add('d-none');
                modalSelect.classList.remove('d-none');
                modalSelect.innerHTML = `
                    <option value="Male" ${currentValue === 'Male' ? 'selected' : ''}>Masculino</option>
                    <option value="Female" ${currentValue === 'Female' ? 'selected' : ''}>Feminino</option>
                `;
            } else if (field === 'available_for_adoption') {
                modalInput.classList.add('d-none');
                modalSelect.classList.remove('d-none');
                modalSelect.innerHTML = `
                    <option value="1" ${currentValue == '1' ? 'selected' : ''}>Sim</option>
                    <option value="0" ${currentValue == '0' ? 'selected' : ''}>Não</option>
                `;
            } else {
                modalInput.classList.remove('d-none');
                modalSelect.classList.add('d-none');
                modalInput.value = currentValue || '';
            }
        });
    </script>
@endsection