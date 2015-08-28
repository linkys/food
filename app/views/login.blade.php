@extends('general.layout')

@section('title')
    Регистрация и авторизация
@stop

@section('content')

    <div class="main">
        {{ Form::open([ 'url' => 'login', 'class' => 'form-horizontal' ]) }}
            <fieldset>
                <legend>Войдите...</legend>
                <div class="form-group">
                    <label class="col-md-4 control-label">Login</label>
                    <div class="col-md-5">
                        {{ Form::text('login', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-5">
                        {{ Form::password('password', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-5 col-md-offset-4 errors">
                        @if ( count($errors->login) > 0 )
                            <span class="errors">неправильные данные</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-5 col-md-offset-4">
                        {{ Form::submit('Enter', [ 'class' => 'btn btn-primary' ]) }}
                    </div>
                </div>

            </fieldset>
        {{ Form::close() }}

        {{ Form::open([ 'url' => 'register', 'class' => 'form-horizontal register-form' ]) }}
            <fieldset>
                <legend>... или зарегистрируйтесь</legend>
                <div class="form-group">
                    <label class="col-md-4 control-label">Login</label>
                    <div class="col-md-5">
                        {{ Form::text('login', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                        <p class="error-msg"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">E-mail</label>
                    <div class="col-md-5">
                        {{ Form::text('email', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                        <p class="error-msg"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-5">
                        {{ Form::password('password', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                        <p class="error-msg"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Repeat password</label>
                    <div class="col-md-5">
                        {{ Form::password('password_r', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                        <p class="error-msg"></p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-5 col-md-offset-4">
                        {{ Form::submit('Enter', [ 'class' => 'btn btn-primary register' ]) }}
                    </div>
                </div>

                {{ Form::hidden('validator', action('UserController@validator')) }}

            </fieldset>
        {{ Form::close() }}
    </div>

@stop