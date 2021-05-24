@extends('basis.basis_page_root')
@section('content')

    <div class="p-5">
       <form method="POST" action="{{ route('auth.login') }}">
        @csrf
         <x-form-elements.header-simple text="Авторизация"/>
         <x-form-elements.text label="Email" name='email' required=true :errors=$errors/>
         <x-form-elements.text label="Пароль" name='password' required=true :errors=$errors/>
         <x-form-elements.button type="submit" class="btn-primary" label="Войти"/>
        </form>
    </div>

@endsection
