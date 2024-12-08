@extends('layouts.form')

@section('title', 'Cadastro de Pet')

@section('url')
    {{ back() }}
@endsection

@section('style')
    <style>
        /* Preview da imagem */
        #imagePreview {
            width: 100%;
            height: 45vh;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 5px; 
        }
    </style>
@endsection

@section('script')
    <script>
        // Atualizar preview da imagem
        document.getElementById('image').addEventListener('input', function() {
            const imageUrl = this.value;
            const imagePreview = document.getElementById('imagePreview');
            if (imageUrl) {
                imagePreview.src = imageUrl;
                imagePreview.style.display = 'block';
            } else {
                imagePreview.style.display = 'none';
            }
        });
    </script>
@endsection

@section('content')
    <section style="margin-top: 10%; margin-bottom: 10%;">
        <form action="{{ url('/pet/create')}}" method="POST">
            @csrf
            <div class="row">
                <!-- Primeira Coluna -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Imagem</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="image" class="form-label">URL da Imagem</label>
                                <input type="url" id="image" name="image" class="form-control" placeholder="Insira a URL da imagem">
                            </div>
                            <div class="mb-3">
                                <img id="imagePreview" src="#" alt="Preview da Imagem" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Segunda Coluna -->
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Formulario de Cadastro</h5>
                        </div>
                        <div class="card-body">
                            <!-- Primeira Linha -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome do pet" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="breed" class="form-label">Raça</label>
                                    <input type="text" id="breed" name="breed" class="form-control" placeholder="Raça do pet">
                                </div>
                            </div>
                            
                            <!-- Segunda Linha -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="age" class="form-label">Idade</label>
                                    <input type="number" id="age" name="age" class="form-control" placeholder="Idade (anos)">
                                </div>
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gênero</label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option selected disabled>Selecione</option>
                                        <option value="Male">Macho</option>
                                        <option value="Female">Fêmea</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="size" class="form-label">Tamanho</label>
                                    <select id="size" name="size" class="form-select">
                                        <option selected disabled>Selecione</option>
                                        <option value="Small">Pequeno</option>
                                        <option value="Medium">Médio</option>
                                        <option value="Large">Grande</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Terceira Linha -->
                            <div class="mb-3">
                                <label for="health_status" class="form-label">Estado de Saúde</label>
                                <input type="text" id="health_status" name="health_status" class="form-control" placeholder="Ex.: Saudável, Vacinas em dia">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Insira uma descrição do pet"></textarea>
                            </div>
                            <!-- Botões -->
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection