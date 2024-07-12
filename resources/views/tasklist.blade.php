@extends('home')

@section('content')

<div>
    <div class="container top-margin-10px">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tarea</th>
                    <th scope="col">Etiqueta</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Marcar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasksArray as $task)
                <tr>
                    <td>{{ $task['name'] }}</td>
                    <td>{{ $task['label_name'] }}</td>
                    <td>{{ $task['estado'] ?? 'No disponible' }}</td> <!-- Cambia 'estado' si tienes otro campo -->
                    <td>
                        <button type="button" class="btn btn-success">Completar</button>
                    </td>
                    <td>
                        <form action="{{ route('task.destroy',$task, ['id' => 'id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>

</div>


@endsection