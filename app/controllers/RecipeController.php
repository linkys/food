<?php

class RecipeController extends BaseController {

    public function get($item, $id=null)
    {
        if($item == 'add'){

            return View::make('add', ['types' => Type::all(), 'kitchens' => Kitchen::all()]);
        }
    }

    public function add()
    {
        $data = Input::all();
        $validator = Recipe::validate($data);

        if ($validator->fails()){
            return Redirect::back()->withErrors($validator, 'addRecipe');
        }

        Recipe::add($data);

        return Redirect::to('/');

//        return $data;
    }

}
