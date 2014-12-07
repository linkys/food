<?php

class Recipe extends Eloquent {

    public static function validate($data)
    {
        return Validator::make($data, [
            'title' => 'required|min:4|max:100',
            'description' => 'required|min:4|max:1000',
            'kitchen' => 'required',
            'type' => 'required',
            'time' => 'required|integer|min:5|max:180',
            'instruction' => 'required|min:4|max:1000',
            'ingredients' => 'required|min:4|max:1000',
        ]);
    }

    public static function add($data)
    {
        $recipe = new Recipe();

        $recipe->user_id = Auth::id();
        $recipe->kitchen_id = $data['kitchen'];
        $recipe->type_id = $data['type'];
        $recipe->ingredients = $data['ingredients'];
        $recipe->title = $data['title'];
        $recipe->time = $data['time'];
        $recipe->description = $data['description'];
        $recipe->instruction= $data['instruction'];

        $recipe->save();
    }

}