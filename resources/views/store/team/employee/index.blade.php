<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipe de {{ $store->name }}</title>
</head>

<body>
    <h1>
        <a href="{{ route('store.show', ['store' => $store]) }}">
            {{ $store->name }}
        </a>
    </h1>
    <h2>Todos da equipe</h2>
    <a href="{{ route('employee.create', ['store' => $store]) }}">Adicionar novo</a>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees->get() as $employee)
                <tr>
                    <td>
                        <form action="{{ route('employee.update', ['store' => $store, 'employee' => $employee]) }}"
                            method="POST">
                            @csrf
                            @method('put')
                            <select name="type" id="type" onchange="this.form.submit()">
                                @foreach ($types as $type)
                                    <option value="{{ $type['id'] }}"
                                        {{ $type['id'] === $employee->type()['id'] ? 'selected' : null }}>
                                        {{ $type['title'] }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>{{ $employee->user()->first()->name }}</td>
                    <td>{{ $employee->user()->first()->email }}</td>
                    <td>{{ $employee->created_at }}</td>
                    <td>
                        <form action="{{ route('employee.destroy', ['store' => $store, 'employee' => $employee]) }}"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">Desvincular</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <?php
    use App\Models\User;
    use App\Models\Store\Formal\Store;
    use App\Models\Store\Team\Employee\Employee;
    ?>
</body>

</html>
