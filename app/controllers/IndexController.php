<?php

class IndexController extends BaseController {

    public function index()
    {
        $recipes = Recipe::orderBy('id', 'DESC')->paginate(3);
//        $recipes = DB::table('recipes')->orderBy('id', 'DESC')->paginate(3);
//        $recipes = DB::table('recipes')->orderBy('id', 'desc')->paginate(3);
//        $recipes = DB::table('recipes')->paginate(15);

        return View::make('index', ['recipes' => $recipes]);
    }

}
