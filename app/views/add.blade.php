@extends('general.layout')

@section('content')

    <div class="main">
        @if (Auth::check())

            {{ Form::open([ 'url' => 'add', 'class' => 'form-horizontal' ]) }}
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Название</label>
                        <div class="col-md-5">
                            {{ Form::text('title', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Описание</label>
                        <div class="col-md-5">
                            {{ Form::textarea('description', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Кухня</label>
                        <div class="col-md-5">
                            <select name="kitchen" class="form-control">
                                @foreach($kitchens as $kitchen)
                                    <option value="{{ $kitchen->id }}">{{ $kitchen->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Тип</label>
                        <div class="col-md-5">
                            <select name="type" class="form-control">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Время приготовления</label>
                        <div class="col-md-5">
                        <div class="input-group">
                            {{ Form::text('time', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                            <span class="input-group-addon">минут</span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Ингредиенты</label>
                        <div class="col-md-5">
                            {{ Form::textarea('ingredients', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Интрукция</label>
                        <div class="col-md-5">
                            {{ Form::textarea('instruction', '', [ 'class' => 'form-control'/*, 'required' => 'true'*/ ]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-4 errors">

                            @foreach( $errors->addRecipe->getMessages() as $error  )
                                @foreach( $error as $message )
                                    {{ $message }} <br/>
                                @endforeach
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-4">
                            {{ Form::submit('Отправить', [ 'class' => 'btn btn-primary' ]) }}
                        </div>
                    </div>

                </fieldset>
            {{ Form::close() }}
        @else
            <h2><a href="/enter">Зарегистрируйтесь</a>, чтобы добавить рецепт</h2>
        @endif

    </div>

@stop