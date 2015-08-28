<?php

class IndexController extends BaseController {

    protected $_kitchens = array(
        'italian',
        'japan',
        'mexico',
        'france',
    );
    protected $_types = array(
        'breakfast',
        'desserts',
        'drinks',
        'risotto',
        'salad',
        'sandwiches',
        'sauce',
        'snack'
    );

    public function index($name = null)
    {
        if($name != null){
            if(in_array($name, $this->_kitchens)){
                $recipes = Recipe::join('types', 'recipes.type_id', '=', 'types.id')
                    ->join('kitchens', 'recipes.kitchen_id', '=', 'kitchens.id')
                    ->join('users', 'recipes.user_id', '=', 'users.id')
                    ->select(
                        'recipes.id',
                        'users.login as username',
                        'kitchens.title as kitchen_title',
                        'kitchens.name as kitchen_name',
                        'types.title as type_title',
                        'types.name as type_name',
                        'recipes.ingredients',
                        'recipes.title',
                        'recipes.time',
                        'recipes.description',
                        'recipes.instruction'
                    )
                    ->where('kitchens.name', '=', $name)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);

                return View::make('index', ['recipes' => $recipes]);

            } elseif(in_array($name, $this->_types)){
                $recipes = Recipe::join('types', 'recipes.type_id', '=', 'types.id')
                    ->join('kitchens', 'recipes.kitchen_id', '=', 'kitchens.id')
                    ->join('users', 'recipes.user_id', '=', 'users.id')
                    ->select(
                        'recipes.id',
                        'users.login as username',
                        'kitchens.title as kitchen_title',
                        'kitchens.name as kitchen_name',
                        'types.title as type_title',
                        'types.name as type_name',
                        'recipes.ingredients',
                        'recipes.title',
                        'recipes.time',
                        'recipes.description',
                        'recipes.instruction'
                    )
                    ->where('types.name', '=', $name)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);

                return View::make('index', ['recipes' => $recipes]);

            } else {
                return Redirect::to('/');
            }
        } else {
            $recipes = Recipe::join('types', 'recipes.type_id', '=', 'types.id')
                ->join('kitchens', 'recipes.kitchen_id', '=', 'kitchens.id')
                ->join('users', 'recipes.user_id', '=', 'users.id')
                ->select(
                    'recipes.id',
                    'users.login as username',
                    'kitchens.title as kitchen_title',
                    'kitchens.name as kitchen_name',
                    'types.title as type_title',
                    'types.name as type_name',
                    'recipes.ingredients',
                    'recipes.title',
                    'recipes.time',
                    'recipes.description',
                    'recipes.instruction'
                )
                ->orderBy('id', 'DESC')
                ->paginate(10);

            return View::make('index', ['recipes' => $recipes]);
        }
    }

}
