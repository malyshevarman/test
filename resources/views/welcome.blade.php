@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Вступительный текст,<br/>
                что бы увидеть таблицу, пройдите регистрацию и авторизацию<br/>
                регистрация доступна по урлу <a href="/register">/register</a> <br/>
                авторизация <a href="/login">/login</a> <br/>
                данные будут доступын после авторизации <a href="/dashboard">/dashboard</a> <br/>
            </div>
            <div class="col-md-12">
                <a href="/login" style="text-decoration: underline">Авторизуйтесь</a> пожалуйста
            </div>
        </div>
    </div>
    </div>
@endsection
