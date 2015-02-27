<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('LanguagesTableSeeder');
        $this->call('PayerGroupsTableSeeder');
        $this->call('TaskTypesTableSeeder');


        $this->call('TasksTableSeeder');
    }

}
