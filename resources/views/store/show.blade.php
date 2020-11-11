<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $store->name }}</title>
</head>

<body>
    <h1>{{ $store->name }}</h1>
    <hr>
    <h2>Colaboradores ({{ count($employees->get()) }})</h2>
    <a href="{{ route('employee.index', ['store' => $store]) }}">
        Ver todos
    </a>
    <ul>
        @foreach ($employees->get() as $employee)
            <li>{{ $employee->user()->first()->name }} &middot; {{ $employee->type()['title'] }}</li>
        @endforeach
        <li>
            <a href="{{ route('employee.create', ['store' => $store]) }}">
                Adicionar novo
            </a>
        </li>
    </ul>
</body>

</html>
