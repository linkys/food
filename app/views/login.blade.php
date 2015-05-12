@extends('general.layout')

@section('title')
    Авторизация
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

        {{ Form::open([ 'url' => 'register', 'class' => 'form-horizontal' ]) }}
            <fieldset>
                <legend>... или зарегистрируйтесь</legend>
                <div class="form-group">
                    <label class="col-md-4 control-label">Login</label>
                    <div class="col-md-5">
                        {{ Form::text('login', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">E-mail</label>
                    <div class="col-md-5">
                        {{ Form::text('email', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-5">
                        {{ Form::password('password', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Repeat password</label>
                    <div class="col-md-5">
                        {{ Form::password('password_r', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-5 col-md-offset-4 errors">

                        @foreach( $errors->register->getMessages() as $error  )
                            @foreach( $error as $message )
                                {{ $message }} <br/>
                            @endforeach
                        @endforeach

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-5 col-md-offset-4">
                        {{ Form::submit('Enter', [ 'class' => 'btn btn-primary' ]) }}
                    </div>
                </div>

            </fieldset>
        {{ Form::close() }}
    </div>

@stop