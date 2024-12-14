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

            /* Animação de saída (slide para cima) */
            .animate-slide-up {
                animation: slideUp 0.5s ease-out forwards;
            }

            /* Alinha o botão de fechar */
            #success-alert .btn-close {
                position: absolute;
                top: 10px;
                right: 10px;
            }


            /* Estilo do botão flutuante */
            .btn-floating {
                position: fixed;
                bottom: 20px;
                right: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: rgb(185, 184, 184); /* Cor azul padrão do Bootstrap */
                color: #fff;
                border-radius: 50px;
                height: 50px;
                width: 50px;
                transition: width 0.3s ease, background-color 0.3s ease;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                z-index: 1050; /* Mantém o alerta sobre outros elementos */
            }

            .btn-floating:hover {
                width: 150px; /* Expande para mostrar o texto */
                background-color: gray; /* Cor mais escura ao passar o mouse */
            }

            .btn-floating svg {
                flex-shrink: 0;
                transition: transform 0.3s ease;
            }

            .btn-floating span {
                white-space: nowrap;
                opacity: 0; /* Texto invisível inicialmente */
                margin-left: 10px;
                transition: opacity 0.3s ease;
            }

            .btn-floating:hover span {
                opacity: 1; /* Mostra o texto no hover */
            }

            .btn-floating:hover svg {
                transform: rotate(360deg); /* Gira o ícone ao passar o mouse */
            }

            /* Animação para o SVG da logo */
            .navbar-brand svg {
                transition: transform 0.3s ease;
            }

            .navbar-brand:hover svg {
                transform: rotate(-10deg) scale(1.1); /* Rotaciona levemente e aumenta de tamanho */
            }

            #link-animation{
                transition: transform 0.3s ease, color 0.3s ease;
            }

            #link-animation:hover{
                transform: scale(1.1); /* Aumenta ligeiramente o link */
                color: black; /* Opcional: Muda a cor ao passar o mouse */
            }
            
            /* Estilo do menu flutuante */
            .floating-menu {
                position: fixed;
                top: 1rem;
                right: 1rem;
                width: 20rem;
                background-color: white;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                display: none; /* Inicialmente escondido */
                flex-direction: column;
                align-items: stretch;
                padding: 10px;
                z-index: 1000;
                transition: opacity 0.3s ease, transform 0.3s ease;
            }

            .floating-menu.open {
                display: flex;
                opacity: 1;
                transform: translateY(0);
            }

            /* Estilo dos itens do menu */
            .floating-menu .menu-item {
                padding: 10px 20px;
                text-decoration: none;
                color: #333;
                display: block;
                width: 100%;
                text-align: left;
            }

            .floating-menu .menu-item:hover {
                background-color: gray;
                color: white;
            }

            .logout-btn {
                width: 100%;
                text-align: center; /* Centraliza o texto */
            }

            /* Botões de fechar no menu */
            .btn-close-menu {
                background-color: transparent;
                border: none;
                cursor: pointer;
                transition: transform 0.3s ease, color 0.3s ease;
            }

            /* Efeito de animação ao passar o mouse sobre o ícone de fechar */
            .btn-close-menu:hover {
                transform: scale(1.2); /* Aumenta o tamanho ao passar o mouse */
            }

            .btn-close-menu svg {
                transition: transform 0.3s ease, fill 0.3s ease;
            }

            /* Animação de transformação nos ícones de fechar */
            .btn-close-menu:hover svg {
                transform: rotate(360deg); /* Rotaciona o ícone */
                fill: red; /* Muda a cor do ícone */
            }

            /* Fundo para fechar ao clicar fora */
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                /* background-color: rgba(0, 0, 0, 0.3); */
                display: none; /* Inicialmente escondido */
                z-index: 999; /* Fica atrás do menu, mas acima do conteúdo */
            }

            .overlay.active {
                display: block;
            }

            /* Ajuste do alerta flutuante para suportar muitos cards */
            .floating-alert {
                position: fixed;
                top: 1rem;
                right: 1rem;
                width: 20rem;
                max-height: 50vh;
                background-color: white;
                color: #333;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 15px;
                border-radius: 8px;
                z-index: 1000;
                display: flex;
                flex-direction: column;
                align-items: stretch;
                justify-content: flex-start;
                gap: 10px;
                transition: opacity 0.3s ease, transform 0.3s ease;
                transform: translateY(50px);
                opacity: 0;
                overflow-y: auto;  /* Permite rolagem quando o conteúdo for maior que o espaço disponível */
            }
        </style>

        @yield('style')
    </head>
    <body>
        @if(session('success'))
            <div id="success-alert" class="alert alert-dismissible fade show text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @auth
            @if (Auth::user()->type == 'admin')
                <!-- Botão flutuante -->
                <a href="{{ url('/pet/create/') }}" style="color: white" class="link-underline link-underline-opacity-0">
                    <div class="btn-floating">
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#ffffff">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/>
                        </svg>
                        <span class="me-2">Cadastrar Pet</span>
                    </div>
                </a>
            @endif
        @endauth

        <!-- Menu flutuante -->
        <div class="floating-menu" id="floatingMenu">
            <!-- Linha com ícones nas extremidades -->
            <div class="d-flex justify-content-between w-100 mb-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-close-menu">
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="gray">
                            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
                        </svg>
                    </button>
                </form>
                <button class="btn-close-menu" onclick="closeMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="gray">
                        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                    </svg>
                </button>
            </div>
            <a href="{{ url('/profile') }}" class="menu-item">Perfil</a>
            @auth
                @if (Auth::user()->type == 'admin')
                    <a href="{{ url('/pet/create') }}" class="menu-item" >Cadastro de Pet</a>
                    <a href="{{ url('/adoption') }}" class="menu-item" >Controle de Solicitações</a>
                @endif
            @endauth
            <!-- Botão de Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger logout-btn mt-3">Logout</button>
            </form>
        </div>

        <div class="floating-alert hidden" id="alert">
            <div class="d-flex justify-content-between w-100 mb-3">
                <h5 class="my-auto">Solicitações de adoção</h5>
                <button class="btn-close-menu" onclick="closeAlert()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="gray">
                        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                    </svg>
                </button>
            </div>

            @yield('alert-menu')
        </div>        

        <!-- Overlay (fundo escuro para fechar ao clicar fora) -->
        <div class="overlay" id="overlay" onclick="closeMenu()"></div>

        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Logo (alinhado à esquerda) -->
                    <a class="navbar-brand m-0 p-0 d-flex" href="{{ Auth::check() == false ? url('/') : url('/dashboard')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35" fill="#000000">
                            <path d="M180-475q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm180-160q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm240 0q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm180 160q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM266-75q-45 0-75.5-34.5T160-191q0-52 35.5-91t70.5-77q29-31 50-67.5t50-68.5q22-26 51-43t63-17q34 0 63 16t51 42q28 32 49.5 69t50.5 69q35 38 70.5 77t35.5 91q0 47-30.5 81.5T694-75q-54 0-107-9t-107-9q-54 0-107 9t-107 9Z" />
                        </svg>
                    </a>

                    <!-- Links de navegação (alinhados à esquerda) -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-2 me-auto mb-lg-0">
                            <li class="nav-item">
                                <a id="link-animation" class="nav-link" href="{{ Auth::check() == false ? url('/') : url('/dashboard')}}">{{ Auth::check() == false ? 'Home' : 'Dashboard'}}</a>
                            </li>
                            <li class="nav-item">
                                <a id="link-animation" class="nav-link" href="{{ url('/pet')}}">Lista de Pets</a>
                            </li>
                            <li class="nav-item">
                                <a id="link-animation" class="nav-link" href="{{ url('/about')}}">Sobre</a>
                            </li>
                            <li class="nav-item">
                                <a id="link-animation" class="nav-link" href="#">Link</a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Botões de informações (alinhados à direita) -->
                    <div class="d-flex">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Cadastrar</a>
                        @endguest
                        @auth
                            @if (Auth::user()->type == 'admin')
                                <a href="#" style="color: black" id="link-animation" class="link-underline link-underline-opacity-0 ms-2 btn-toggle-menu" onclick="showAlert()">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35" fill="#000000"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                                </a>
                            @endif
                            <a href="#" style="color: black" id="link-animation" class="link-underline link-underline-opacity-0 ms-2 btn-toggle-menu" onclick="toggleMenu()">
                                {{ Auth::user()->name }}
                                <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35" fill="#000000">
                                    <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                                </svg>
                            </a>
                        @endauth
                    </div>

                    <!-- Botão de toggle para telas pequenas -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </header>

        <main class="container-fluid">
            @yield('content', 'Aqui vai ficar os conteudos do main')
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

        <script>
            // Fechar automaticamente o alerta após 5 segundos
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.classList.add('animate-slide-up'); // Adiciona a classe de animação
                    setTimeout(() => successAlert.remove(), 500); // Remove o alerta do DOM após a animação
                }, 5000); // Aguarda 5 segundos antes de começar
            }
            // Função para abrir o menu
            function toggleMenu() {
                const menu = document.getElementById('floatingMenu');
                const overlay = document.getElementById('overlay');
                menu.classList.toggle('open');
                overlay.classList.toggle('active');
            }

            // Função para fechar o menu
            function closeMenu() {
                const menu = document.getElementById('floatingMenu');
                const overlay = document.getElementById('overlay');
                menu.classList.remove('open');
                overlay.classList.remove('active');
            }

            function showAlert() {
                const alert = document.getElementById('alert');
                alert.classList.remove('hidden');
                alert.classList.add('visible');
            }

            function closeAlert() {
                const alert = document.getElementById('alert');
                alert.classList.remove('visible');
                alert.classList.add('hidden');
            }
        </script>

        <!-- CDN do Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
            @yield('script')
    </body>
</html>