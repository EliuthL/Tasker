@extends('home')

@section('content')
<div class="container">
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
    <form id="newTask" action="{{ route('task.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombret">Tarea</label>
            <input type="text" class="form-control" id="nombret" name="nombretarea" placeholder="Nombre de tu tarea">
        </div>


        <select id="label_id" name="label_id" class="form-control top-margin-10px">
            @foreach($labels as $label)
            <option value="{{$label->id}}">{{ $label->name }}</option>
            @endforeach
        </select>
    </form>
    <button type="button" class="btn btn-primary top-margin-10px" onclick="submit(this, 'newTask')">Agregar</button>

</div>
@endsection

@section('scripts')
<script src="{{ asset('js/close.js') }}"></script>
<script src=" {{ asset('js/buttom.js') }}"></script>
@endsection