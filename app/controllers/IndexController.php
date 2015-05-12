<?php

class IndexController extends BaseController {

    public function index($item=null, $id=null)
    {
        if (isset($item) && isset($id)){

            if($item == 'type'){
                $item = Type::where('name', '=', $id);

                $recipes = Recipe::where('type_id', '=', Input::get('id'))->orderBy('id', 'DESC')->paginate(3);
                return View::make('index', ['recipes' => $recipes]);
            }

            if($item == 'kitchen'){

            }

        }else{

            $recipes = Recipe::orderBy('id', 'DESC')->paginate(3);
            return View::make('index', ['recipes' => $recipes]);

        }
    }

}
