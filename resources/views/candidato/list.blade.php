@extends('plantilla')
@section('content')
<style>
    .uper {
    margin-top: 40px;
    }
</style>

<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br />
    @endif
<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>NOMBRE COMPLETO</td>
            <td>SEXO</td>
            <td>FOTO</td>
            <td>PERFIL</td>
            <td colspan="2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        @foreach($candidatos as $candidato)
        <tr>
            <td>{{$candidato->id}}</td>
            <td>{{$candidato->nombrecompleto}}</td>
            <td>{{$candidato->sexo}}</td>
            <td><img src="/image/{{$candidato->foto}}" width="128px"></td>
            <td><a target="blanck" href="/pdf/{{$candidato->perfil}}">perfil</a></td>
            <td><a href="{{ route('candidato.edit', $candidato->id)}}"
            class="btn btn-primary">Edit</a></td>
            <td>
            <form action="{{ route('candidato.destroy', $candidato->id)}}"
            method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"
            onclick="return confirm('Esta seguro de borrar {{$candidato->nombrecompleto}}')" >Del</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
@endsection
