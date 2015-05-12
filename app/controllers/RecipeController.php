<?php

class RecipeController extends BaseController {

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
