@extends('layouts.app')

@section('content')
<div class="container">
@if (Session::has('mensaje'))
    {{ Session::get('mensaje')}}
@endif

<a href="{{url('empleado/create')}}" class="btn btn-success">Registrar Nuevo Empleado</a>
<table class="table table-light">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Correo</th>
        <th>Foto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)

        <tr>
            <td>{{$empleado->id}}</td>
            <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$empleado->Foto}}" alt="" width="100"></td>
            <td>{{$empleado->Nombre}}</td>
            <td>{{$empleado->ApellidoPaterno}}</td>
            <td>{{$empleado->ApellidoMaterno}}</td>
            <td>{{$empleado->Correo}}</td>

            <td>
                <a href="{{url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-warning">
                Editar
                </a>
                <form action="{{url('/empleado/'.$empleado->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                        <input type="submit" class="btn btn-danger" onclick="return confirm('Quieres borrar ?')" value="Borrar">
                </form>
            </td>

        </tr>

      @endforeach
    </tbody>
  </table>
</div>
@endsection
