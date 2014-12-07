<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        $this->call('TypesTableSeeder');
        $this->call('KitchensTableSeeder');

        $this->command->info('Таблица успешно загружена данными!');
    }

}

class TypesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('types')->delete();

        DB::table('types')->insert(array(
            array('name' => 'breakfast', 'title' => 'Завтраки'),
            array('name' => 'desserts', 'title' => 'Десерты'),
            array('name' => 'drinks', 'title' => 'Напитки'),
            array('name' => 'risotto', 'title' => 'Ризотто'),
            array('name' => 'salad', 'title' => 'Салаты'),
            array('name' => 'sandwiches', 'title' => 'Сэндвичи'),
            array('name' => 'sauce', 'title' => 'Соусы'),
            array('name' => 'snack', 'title' => 'Закуски'),
        ));
    }

}

class KitchensTableSeeder extends Seeder {

    public function run()
    {
        DB::table('kitchens')->delete();

        DB::table('kitchens')->insert(array(
            array('name' => 'italian', 'title' => 'Итальянская'),
            array('name' => 'japan', 'title' => 'Японская'),
            array('name' => 'mexico', 'title' => 'Мексиканская'),
            array('name' => 'france', 'title' => 'Французская'),
        ));
    }

}