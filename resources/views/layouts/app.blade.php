<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Title')</title>

        <!-- CDN do Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style>
            /* Estilo do Alerta de Sucesso */
            #success-alert {
                position: fixed;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                width: 40vh; /* Define uma largura fixa */
                z-index: 1050; /* Mantém o alerta sobre outros elementos */
                opacity: 0.95; /* Leve transparência para dar um toque mais suave */
                background-color: white; /* Cor de fundo neutra */
                color: #333; /* Cor do texto */
                border: 1px solid #ddd; /* Borda leve */
                border-radius: 8px; /* Bordas arredondadas */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra suave */
                padding: 15px; /* Espaçamento interno */
                animation: slideDown 0.5s ease-out; /* Animação de entrada */
            }
    
            /* Animações de entrada e saída */
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translate(-50%, -20px);
                }
                to {
                    opacity: 0.95;
                    transform: translate(-50%, 0);
                }
            }
    
            @keyframes slideUp {
                from {
                    opacity: 0.95;
                    transform: translate(-50%, 0);
                }
                to {
                    opacity: 0;
                    transform: translate(-50%, -20px);
                }
            }
    
            /* Alinha o botão de fechar */
            #success-alert .btn-close {
                position: absolute;
                top: 10px;
                right: 10px;
            }


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


            
            .arrow-back {
                font-size: 1.5rem;
                position: absolute;
                top: 20px;
                left: 20px;
                color: #007bff;
                cursor: pointer;
                text-decoration: none;
            }

            .arrow-back:hover {
                color: #0056b3;
            }

            .card-custom {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border: none;
                border-radius: 10px;
                overflow: hidden;
            }

            .card-img {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
                background-color: #f8f9fa;
            }

            .card-img img {
                max-width: 100%;
                max-height: 200px;
                border-radius: 50%;
            }

            .card-content {
                padding: 20px;
            }

            .title {
                font-size: 1.5rem;
                font-weight: bold;
            }

            .edit-btn {
                margin-left: auto;
                padding: 5px 10px;
            }

            .info-row {
                display: flex;
                align-items: center;
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>
        <!-- Alerta de Sucesso -->
        @if(session('success'))
            <div id="success-alert" class="alert alert-dismissible fade show text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Logo (alinhado à esquerda) -->
                    <a class="navbar-brand m-0 p-0 d-flex" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35" fill="#000000"><path d="M180-475q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm180-160q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm240 0q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm180 160q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM266-75q-45 0-75.5-34.5T160-191q0-52 35.5-91t70.5-77q29-31 50-67.5t50-68.5q22-26 51-43t63-17q34 0 63 16t51 42q28 32 49.5 69t50.5 69q35 38 70.5 77t35.5 91q0 47-30.5 81.5T694-75q-54 0-107-9t-107-9q-54 0-107 9t-107 9Z"/></svg>
                    </a>

                    <!-- Botão de toggle para telas pequenas -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Links de navegação (alinhados à esquerda) -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-2 me-auto mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                        </ul>

                        <!-- Botões de informações (alinhados à direita) -->
                        <div class="d-flex">
                            <button class="btn btn-outline-secondary me-2" type="button">Login</button>
                            <button class="btn btn-outline-secondary" type="button">Cadastrar</button>
                            <a href="#" style="color: black" class="link-underline link-underline-opacity-0 ms-2">
                                Name
                                <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35" fill="#000000"><path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container">
            {{-- @yield('content', 'Aqui vai ficar os conteudos do main') --}}
            <section class="my-5">
                <div class="container my-5 position-relative">
                    <!-- Seta de Voltar -->
                    <a href="#" class="arrow-back">
                        &larr; Voltar
                    </a>
                
                    <!-- Card -->
                    <div class="card card-custom">
                        <div class="row g-0">
                            <!-- Primeira Coluna (Imagem) -->
                            <div class="col-md-4 card-img">
                                <img src="https://via.placeholder.com/150" alt="Foto">
                            </div>
                
                            <!-- Segunda Coluna (Títulos e Botões de Edição) -->
                            <div class="col-md-8">
                                <div class="card-content">
                                    <!-- Linha de Informação 1 -->
                                    <div class="info-row">
                                        <span class="title">Nome do Usuário</span>
                                        <button class="btn btn-primary edit-btn">Editar</button>
                                    </div>
                
                                    <!-- Linha de Informação 2 -->
                                    <div class="info-row">
                                        <span class="title">Email do Usuário</span>
                                        <button class="btn btn-primary edit-btn">Editar</button>
                                    </div>
                
                                    <!-- Linha de Informação 3 -->
                                    <div class="info-row">
                                        <span class="title">Telefone</span>
                                        <button class="btn btn-primary edit-btn">Editar</button>
                                    </div>
                
                                    <!-- Linha de Informação 4 -->
                                    <div class="info-row">
                                        <span class="title">Endereço</span>
                                        <button class="btn btn-primary edit-btn">Editar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </section>
            <section class="my-5">
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
            </section>
            <section class="container-fluid my-5 w-100">
                <div class="row">
                    <!-- Primeira Coluna (Menor) - Menu com Checkboxes -->
                    <div class="col-lg-3 col-md-4 col-12 menu-checkbox">
                        <h3>Filtros</h3>
                        <div>
                            <div class="mb-3">
                                <input type="checkbox" id="option1" value="option1">
                                <label for="option1">Opção 1</label>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="option2" value="option2">
                                <label for="option2">Opção 2</label>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="option3" value="option3">
                                <label for="option3">Opção 3</label>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="option4" value="option4">
                                <label for="option4">Opção 4</label>
                            </div>
                        </div>
                    </div>
            
                    <!-- Segunda Coluna (Maior) - Grid com Cards -->
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="row g-4">
                            <!-- Card 1 -->
                            <div class="col-md-4 col-12">
                                <div class="card card-custom">
                                    <img src="https://via.placeholder.com/350x200?text=Imagem+1" class="card-image" alt="Imagem 1">
                                    <div class="card-body">
                                        <h5 class="title">Título do Card 1</h5>
                                        <p class="subtitle">Subtítulo do Card 1</p>
                                        <a href="#" class="btn btn-primary">Saiba mais</a>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Card 2 -->
                            <div class="col-md-4 col-12">
                                <div class="card card-custom">
                                    <img src="https://via.placeholder.com/350x200?text=Imagem+2" class="card-image" alt="Imagem 2">
                                    <div class="card-body">
                                        <h5 class="title">Título do Card 2</h5>
                                        <p class="subtitle">Subtítulo do Card 2</p>
                                        <a href="#" class="btn btn-primary">Saiba mais</a>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Card 3 -->
                            <div class="col-md-4 col-12">
                                <div class="card card-custom">
                                    <img src="https://via.placeholder.com/350x200?text=Imagem+3" class="card-image" alt="Imagem 3">
                                    <div class="card-body">
                                        <h5 class="title">Título do Card 3</h5>
                                        <p class="subtitle">Subtítulo do Card 3</p>
                                        <a href="#" class="btn btn-primary">Saiba mais</a>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Card 4 -->
                            <div class="col-md-4 col-12">
                                <div class="card card-custom">
                                    <img src="https://via.placeholder.com/350x200?text=Imagem+4" class="card-image" alt="Imagem 4">
                                    <div class="card-body">
                                        <h5 class="title">Título do Card 4</h5>
                                        <p class="subtitle">Subtítulo do Card 4</p>
                                        <a href="#" class="btn btn-primary">Saiba mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="text-bg-secondary text-center py-4">
            <div class="container">
                <!-- Logo ou nome do site -->
                <div class="mb-3">
                    <h5>Nome do Seu Site</h5>
                    <p class="mb-0">Seu slogan ou descrição aqui.</p>
                </div>

                <!-- Links de navegação no rodapé -->
                <div class="mb-3">
                    <a href="#" class="text-white me-3">Sobre nós</a>
                    <a href="#" class="text-white me-3">Termos de Serviço</a>
                    <a href="#" class="text-white me-3">Política de Privacidade</a>
                    <a href="#" class="text-white">Contato</a>
                </div>

                <!-- Direitos Autorais -->
                <div>
                    <p class="mb-0">© 2024 Nome do Seu Site. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>

        <!-- CDN do Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>