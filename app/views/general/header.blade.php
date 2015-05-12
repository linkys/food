<div class="masthead">
        <h3 class="text-muted">Книга рецептов</h3>
        <div role="navigation">
          <ul class="nav nav-justified">
            <li><a href="/">Главная</a></li>
            <li><a href="/add">Добавить рецепт</a></li>
            {{--<li><a href="#">Авторы</a></li>--}}
            <li><a href="/search">Найти</a></li>
            @if (Auth::check())
                <li><a href="/user/{{ Auth::id() }}">{{ Auth::user()->login }}</a></li>
                <li><a href="/logout">Выйти</a></li>
            @else
                <li><a href="/enter">Войти</a></li>
            @endif
          </ul>
        </div>
      </div>