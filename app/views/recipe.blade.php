@extends('general.layout')

@section('title')
    Книга рецептов
@stop

@section('content')

    <div class="jumbotron">
        <ul class="recipe">
            <li><a href="/recipe/breakfast">{{ HTML::image('img/breakfast.jpg') }}<br>Завтрак</a></li>
            <li><a href="/recipe/desserts">{{ HTML::image('img/desserts.jpg') }}<br>Десерты</a></li>
            <li><a href="/recipe/drinks">{{ HTML::image('img/drinks.jpg') }}<br>Напитки</a></li>
            <li><a href="/recipe/risotto">{{ HTML::image('img/risotto.jpg') }}<br>Ризотто</a></li>
            <li><a href="/recipe/salad">{{ HTML::image('img/salad.jpg') }}<br>Салаты</a></li>
            <li><a href="/recipe/sandwiches">{{ HTML::image('img/sandwiches.jpg') }}<br>Сэндвичи</a></li>
            <li><a href="/recipe/sauce">{{ HTML::image('img/sauce.jpg') }}<br>Соусы</a></li>
            <li><a href="/recipe/snack">{{ HTML::image('img/snack.jpg') }}<br>Закуски</a></li>
            <li class="kitchen"><a href="/recipe/italian">Итальянская</a></li>
            <li class="kitchen"><a href="/recipe/japan">Японская</a></li>
            <li class="kitchen"><a href="/recipe/mexico">Мексиканская</a></li>
            <li class="kitchen"><a href="/recipe/france">Французская</a></li>
        </ul>
    </div>

    <div class="main col-lg-offset-1 col-lg-10">
        @if(count($recipe) > 0)
            @foreach($recipe as $item)
                <div class="item">
                    {{--<img src="#" width="150" height="150" alt=""/>--}}
                    {{--<h1><a href="/recipe/breakfast/4513">{{ $item->title }}</a></h1>--}}
                    <h1><a href="{{ action('RecipeController@index', [$item->id]) }}">{{ $item->title }}</a></h1>
                    <div class="desc">
                        <p>{{ $item->description }}</p>
                        <label for="">Ингредиенты:</label>
                        <p>{{ $item->ingredients }}</p>
                        <label for="">Инструкция:</label>
                        <p>{{ $item->instruction }}</p>
                    </div>
                    <div class="info">
                        <p class="author">Автор: <a href="/user/21">{{ $item->username }}</a></p>
                        <p><span class="info-item">{{ $item->time }} минут</span></p>
                        <p><span class="info-item">{{ $item->kitchen_title }} кухня</span></p>
                        <p><span class="info-item">{{ $item->type_title }}</span></p>
                    </div>


                    <div style="clear: both"></div>
                </div>
            @endforeach
        @else
            <p>error</p>
        @endif

    </div>

@stop