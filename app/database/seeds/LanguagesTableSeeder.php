<?php

/**
 * Class LanguagesTableSeeder
 */
class LanguagesTableSeeder extends Seeder
{

    /**
     * Run the database languages seed.
     *
     * @return void
     */
    public function run()
    {
        //Russian language
        $ru = new Language;
        $ru->abbr = 'ru';
        $ru->title = 'Русский';
        $ru->save();

        //Ukrainian language
        $ua = new Language;
        $ua->abbr = 'ua';
        $ua->title = 'Українська';
        $ua->save();
    }

}