<?php

class RecipeController extends BaseController {

    public function index($id){

        $recipe = Recipe::join('types', 'recipes.type_id', '=', 'types.id')
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
            ->where('recipes.id', '=', $id)
            ->orderBy('id', 'DESC')
            ->get();

        return View::make('recipe', ['recipe' => $recipe]);
    }

    public function viewAddPage(){
        return View::make('add', ['types' => Type::all(), 'kitchens' => Kitchen::all()]);
    }

    public function add()
    {
        //if (Request::ajax() && Auth::check()) {

            $data = Input::all();
            Recipe::add($data);

            return Redirect::to('/');
        //}
    }

    public function validator()
    {
        if (Request::ajax() && Auth::check()) {

            $data = Input::all();
            $validator = Recipe::validate($data);

            if ($validator->fails())
            {
                $error = $validator->messages();
                $status = false;
            } else {
                $status = true;
                $error = null;
            }

            $ret = array(
                'error' => $error,
                'status' => $status
            );

            return $ret;

        }
    }

}
