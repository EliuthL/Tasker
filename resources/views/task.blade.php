@extends('home')

@section('content')
<div class="container">
    <form>
        <div class="form-group">
            <label for="nombewt">Tarea</label>
            <input type="text" class="form-control" id="nombret" name="nombret" placeholder="your task name">
        </div>

        <select class="form-control top-margin-10px">
            <option>Default select</option>
        </select>

        <button type="submit" class="btn btn-primary top-margin-10px">Agregar</button>
    </form>
</div>
@endsection