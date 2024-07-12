@extends('home')

@section('content')

<div class="container">


    <form action="{{ route('label.store') }}" method="POST">
        @csrf


        @if (session('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="modal">
            <strong>Task complete</strong> {{ session('Success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="btn-close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="modal">
            <strong>The task has failed!</strong> {{ $errors->first()}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" id="btn-close" aria-label="Close"></button>
        </div>
        @endif

        <div class="form-group">
            <label for="nombre">Estiqueta</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="your label name">
        </div>

        <button type="submit" class="btn btn-primary top-margin-10px">Agregar</button>


    </form>

    <table class="table top-margin-10px">
        <thead>
            <tr>
                <th scope="col">Label name</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($labels as $label)
            <tr>
                <td>{{ $label->name }}</td>
                <td>
                    <form action="{{ route('label.destroy',$label, ['id' => 'id']) }}" method="POST">
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

@endsection

@section('scripts')
<script src="{{ asset('js/close.js') }}"></script>
@endsection