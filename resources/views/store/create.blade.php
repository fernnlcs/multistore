<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova loja</title>
</head>
<body>
    <h1>Nova loja</h1>
    <form action="{{ route('store.store') }}" method="POST">
        @csrf
        <label for="cnpj">CNPJ</label>
        <br>
        <input type="text" name="cnpj" id="cnpj" required>
        <br><br>
        <label for="name">Nome da loja</label>
        <br>
        <input type="text" name="name" id="name" required>
        <br><br>
        <label for="slug">Slug</label>
        <br>
        <input type="text" name="slug" id="slug" required>
        <br><br>
        <label for="email">E-mail</label>
        <br>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="phone">Telefone</label>
        <br>
        <input type="tel" name="phone" id="phone">
        <br><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>