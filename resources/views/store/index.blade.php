<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suas Lojas</title>
</head>

<body>
    <h1>Suas lojas</h1>
    <ul>
        @foreach ($myJobs as $employee)
            <li>
                <a href="{{ route('store.show', ['store' => $employee->store()->first()]) }}">
                    {{ $employee->store()->first()->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <hr>
    <a href="{{ route('store.create') }}">Cadastrar nova loja</a>
</body>

</html>
