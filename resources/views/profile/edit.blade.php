@extends('layouts.form')

@section('title' , 'Perfil')

@section('url')
    {{ url('/dashboard')}}
@endsection

@section('style')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .profile-container {
            margin-top: 50px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-header,
        .modal-footer {
            border: none;
        }
    </style>
@endsection

@section('script')
    <script>
        // Função para abrir o Modal
        function openModal() {
            var modal = new bootstrap.Modal(document.getElementById('confirm-user-deletion'));
            modal.show();
        }
        document.getElementById('phone_number').addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
                value = value.replace(/^(\d{2})(\d)/g, '($1) $2'); // Adiciona o parênteses no DDD
                value = value.replace(/(\d)(\d{4})$/, '$1-$2'); // Adiciona o hífen
                e.target.value = value;
            });
    </script>
@endsection

@section('content')
    <section style="margin-top: 10%; margin-bottom: 10%;">
        <div class="container profile-container">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center vh-50 mb-3">
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50vh" viewBox="0 -960 960 960" width="50vh" fill="black">
                                        <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/>
                                    </svg>
                                    <div class="mt-1">
                                        <h3 class="form-label">{{ Auth::user()->name }}</h3>
                                        <p class="form-control-plaintext" style="color: rgb(180, 180, 180)"><i>{{ Auth::user()->type }}</i></p>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                    <!-- Card com Data de Criação -->
                    <div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center" style="flex-direction: column">
                            <p class="mb-0">Conta criada em: {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                            <p class="mb-0">Conta autalizada em: {{ Auth::user()->updated_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <header>
                                <h2 class="card-title text-lg font-medium text-gray-900">
                                    Excluir Conta
                                </h2>
                                <p class="mt-2 text-sm text-gray-600">
                                    Após a exclusão da sua conta, todos os seus recursos e dados serão excluídos permanentemente.
                                </p>
                            </header>
            
                            <!-- Botão para abrir o Modal -->
                            <div class="d-flex">
                                <button class="btn btn-danger ms-auto" onclick="openModal()">Excluir Conta</button>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Coluna 2 -->
                <div class="col-lg-6">
                    <!-- Card com Nome e Tipo de Usuário -->
                    <div class="card">
                        <div class="card-body">                       
                            <h4 class="card-title">Informações Pessoais</h4>
                            <!-- Formulário do Nome -->
                            <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Nome do Usuario">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary mt-2 ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#confirmModal" data-form-id="nameForm">Salvar Nome</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Card com Email e Número de Telefone -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Contato</h4>
                            <!-- Formulário do Email -->
                            <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth::user()->email }}" placeholder="Email do Usuario">
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary mt-2 ms-auto" data-bs-toggle="modal"
                                                data-bs-target="#confirmModal" data-form-id="emailForm">Salvar Email</button>
                                        </div>
                                </div>
                            </form>
                            <!-- Formulário do Número de Telefone -->
                            <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Número de Telefone</label>
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ Auth::user()->phone_number }}" placeholder="Telefone do Usuario">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary mt-2 ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#confirmModal" data-form-id="phoneForm">Salvar Telefone</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Card com Senha -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Segurança</h4>
                            <!-- Formulário da Senha -->
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="password" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Nova senha">
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Confirmação de Senha</label>
                                    <input type="password" class="form-control" id="confirm-password" name="password_confirmation"
                                        placeholder="Confirme sua nova senha">
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary mt-2 ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#confirmModal" data-form-id="passwordForm">Salvar Senha</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Você tem certeza que deseja excluir sua conta?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>

                    <div class="modal-body">
                        <p>Por favor, insira sua senha para confirmar que você realmente deseja excluir sua conta.</p>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="form-control"
                                placeholder="Digite sua senha"
                            />
                            <span class="text-danger" id="password-error"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir Conta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection