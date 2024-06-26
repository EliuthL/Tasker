@extends('home')

@section('content')

<div class="container">
    <form>
        <div class="form-group">
            <label for="nombre">Estiqueta</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="your task name">
        </div>

        <button type="submit" class="btn btn-primary top-margin-10px">Agregar</button>
    </form>
</div>


@endsection