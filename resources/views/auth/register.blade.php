<!-- resources/views/auth/register.blade.php -->
@extends('layout')

@section('content')
<div class="col-md-8 col-md-offset-2">
<h2 class="text-center">Naujo vartotojo registracija : </h2>

<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    @include('errors.list')

    <div class="form-group">
         <label for="name">Vardas :</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
         <label for="name">Pavardė :</label>
        <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}">
    </div>

    <div class="form-group">
         <label for="email">El. paštas :</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="form-group">
         <label for="password">Slaptažodis :</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
         <label for="password_confirmation">Slaptažodis dar kart :</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>

    <div class="form-group">
        <button type="submit" class="btn register-button">Registruotis</button>
    </div>
</form>

</div>
@endsection