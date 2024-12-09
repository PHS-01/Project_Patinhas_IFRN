<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "Title")</title>
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
        
        /* Ícone fixo na tela */
        .fixed-icon {
            position: fixed;
            top: 20px; /* Distância do topo */
            left: 20px; /* Distância da esquerda */
            z-index: 1000; /* Sempre acima de outros elementos */
            padding: 10px;
        }

        /* Animação do SVG na navbar */
        .fixed-icon svg {
            transition: transform 0.3s ease-in-out;
        }

        .fixed-icon:hover svg {
            transform: translateX(-5px); /* Move 10px para a esquerda */
        }

        .fixed-icon:hover svg:active {
            transform: translateX(-5px); /* Move um pouco menos quando clicado */
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

    <header>
        <!-- Navbar -->
        <a class="fixed-icon" href="@yield('url')">
            <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35" fill="black">
                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
            </svg>
        </a>
    </header>

    <main class="container">
        @yield('content', 'Aqui vai ficar os conteudos do main')
    </main>

    <footer class="text-bg-secondary text-center py-4">
        <div class="container">
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
    </script>
    
    <!-- CDN do Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @yield('script')
</body>
</html>