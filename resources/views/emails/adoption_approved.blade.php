<!-- emails/adoption_approved.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adoção Aprovada</title>
</head>
<body>
    <h1>Parabéns! Sua adoção foi aprovada.</h1>
    <p>Detalhes da adoção:</p>
    <ul>
        <li>Nome do Usuário: {{ $adoption->user->name }}</li>
        <li>Email do Usuário: {{ $adoption->user->email }}</li>
        <li>Data da Adoção: {{ $adoption->adoption_date }}</li>
        <li>Status: {{ $adoption->status }}</li>
    </ul>
</body>
</html>
