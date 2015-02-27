<?php

/**
 * Class PayerGroupsTableSeeder
 */
class PayerGroupsTableSeeder extends Seeder
{

    /**
     * Run the database payer groups seed.
     *
     * @return void
     */
    public function run()
    {
        //First and second user groups
        $firstAndSecond = new PayerGroup;
        $firstAndSecond->group = '12';
        $firstAndSecond->description = 'Первая и вторая';
        $firstAndSecond->save();

        //Third and fifth user groups
        $thirdAndFifth = new PayerGroup;
        $thirdAndFifth->group = '35';
        $thirdAndFifth->description = 'Третья и пятая';
        $thirdAndFifth->save();

        //Fourth and sixth user groups
        $fourthAndSixth = new PayerGroup;
        $fourthAndSixth->group = '46';
        $fourthAndSixth->description = 'Четвертая и шестая';
        $fourthAndSixth->save();
    }

}