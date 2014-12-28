<?php

class RecipeController extends BaseController {

    protected $_items_vals = array(
        'breakfast',
        'desserts',
        'drinks',
        'risotto',
        'salad',
        'sandwiches',
        'sauce',
        'snack',
        'italian',
        'japan',
        'mexico',
        'france',
    );

    public function get($item, $id=null)
    {
        if($item == 'add'){

            return View::make('add', ['types' => Type::all(), 'kitchens' => Kitchen::all()]);
        }

        if (in_array($item, $this->_items_vals)) {

        }
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
