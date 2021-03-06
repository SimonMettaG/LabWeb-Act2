@extends('layouts.main')

@section('content')
    <h1>Registro de Usuario</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <form action="{{ route('auth.do-register') }}" method="POST">
        @csrf
        <label for="">Nombre</label>
        <input type="text" name="name" id="">
        <br>
        <label for="">Email</label>
        <input type="text" name="email" id="">
        <br>
        <label for="">Role</label>
        <select name="role" id="role">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
            <option value="Super">Super</option>
        </select>
        <br>
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <br>
        <label for="">Confirmar Password</label>
        <input type="password" name="password_confirmation" id="">
        <br>
        <input type="submit" value="Registrarse">
    </form>
@endsection
