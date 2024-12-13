@extends('layouts.app')

@section('title', 'Home')

@section('style')
<style>
    /* Estilo base */
    body {
        cursor: auto; /* Cursor padrão */
    }

    /* Elemento do cursor customizado */
    .custom-cursor {
        position: fixed;
        top: 0;
        left: 0;
        width: 35px;
        height: 35px;
        pointer-events: none;
        z-index: 9999;
        transform: translate(-50%, -50%) rotate(335deg);
        display: none; /* Oculta o cursor customizado por padrão */
    }

    .custom-cursor svg {
        width: 100%;
        height: 100%;
    }

    section {
        height: 35rem;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: none; /* Oculta o cursor padrão na seção */
    }
</style>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Criação do elemento de cursor customizado
        const cursor = document.createElement('div');
        cursor.classList.add('custom-cursor');
        cursor.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#000">
                <path d="M180-475q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm180-160q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm240 0q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Zm180 160q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM266-75q-45 0-75.5-34.5T160-191q0-52 35.5-91t70.5-77q29-31 50-67.5t50-68.5q22-26 51-43t63-17q34 0 63 16t51 42q28 32 49.5 69t50.5 69q35 38 70.5 77t35.5 91q0 47-30.5 81.5T694-75q-54 0-107-9t-107-9q-54 0-107 9t-107 9Z" />
            </svg>
        `;
        document.body.appendChild(cursor);

        // Referência à seção
        const section = document.querySelector('section');

        // Mostra ou oculta o cursor customizado com base no mouse
        document.addEventListener('mousemove', (e) => {
            const { clientX, clientY } = e;
            const rect = section.getBoundingClientRect();

            // Verifica se o mouse está sobre a seção
            if (
                clientX >= rect.left &&
                clientX <= rect.right &&
                clientY >= rect.top &&
                clientY <= rect.bottom
            ) {
                cursor.style.display = 'block';
                cursor.style.left = `${clientX}px`;
                cursor.style.top = `${clientY}px`;
            } else {
                cursor.style.display = 'none';
            }
        });
    });
</script>
@endsection

@section('content')
<section>
    <h2>Bem-vindo ao site "Patinhas do IFRN"</h2>
</section>
@endsection
