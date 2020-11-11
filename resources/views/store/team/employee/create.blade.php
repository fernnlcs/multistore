<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Funcionário</title>
</head>
<body>
    <h1>
        <a href="{{ route('store.show', ['store' => $store]) }}">
            {{ $store->name }}
        </a>
    </h1>
    <h2>Cadastrar colaborador</h2>
    <form action="{{ route('employee.store', ['store' => $store]) }}" method="POST">
        @csrf
        <label for="email">E-mail do colaborador</label>
        <br>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="type">Tipo</label>
        <br>
        <select name="type" id="type">
            @foreach ($types as $type)
                <option value="{{ $type['id'] }}">{{ $type['title'] }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>