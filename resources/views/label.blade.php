@extends('home')

@section('content')

<div class="container">


    <form id="newLabel" action="{{ route('label.store') }}" method="POST">
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
            <button type="button" class="btn-close" data-bs-dismiss="alert" id="btn-close" aria-label="Close" ></button>
        </div>
        @endif

        <div class="form-group">
            <label for="nombre">Estiqueta</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de tu etiqueta">
        </div>
    </form>

    <button type="button" class="btn btn-primary top-margin-10px" onclick="submit(this,'newLabel')">Agregar</button>

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
                    <form id="deleteLabel" action="{{ route('label.destroy',$label, ['id' => 'id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="openModal(this)">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p class="text-center">¿Estás seguro de que deseas eliminar la etiqueta?</p>
        <button class="my-btn-primary" onclick="submit(this,'deleteLabel')">Sí</button>
        <button class="top-margin-10px danger-btn" onclick="closeModal()">Cancelar</button>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/close.js') }}"></script>
<script src=" {{ asset('js/buttom.js') }}"></script>
@endsection