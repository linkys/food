@extends('general.layout')

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

        @foreach($recipes as $item)
        <div class="item">
            <img src="#" width="150" height="150" alt=""/>
            {{--<h1><a href="/recipe/breakfast/4513">{{ $item->title }}</a></h1>--}}
            <h1><a href="{{ action('RecipeController@get', [$item->kitchen_id, $item->id]) }}">{{ $item->title }}</a></h1>
            <p class="author">Автор: <a href="/user/21">John Smith</a></p>
            <p class="info">
                <span class="ingredients">6 ингредиентов</span>
                <span class="time">40 минут</span>
            </p>
            <div style="clear: both"></div>
        </div>
        @endforeach

        {{ $recipes->links() }}

    </div>

@stop