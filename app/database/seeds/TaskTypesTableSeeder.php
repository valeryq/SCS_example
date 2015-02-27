<?php

/**
 * Class TaskTypesTableSeeder
 */
class TaskTypesTableSeeder extends Seeder
{

    /**
     * Run the database task types seed.
     *
     * @return void
     */
    public function run()
    {
        //Submission of declaration
        $sd = new TaskType;
        $sd->abbr = 'sd';
        $sd->title = 'Подача налоговой декларации';
        $sd->save();

        //Payment of a single social contribution
        $pssc = new TaskType;
        $pssc->abbr = 'pssc';
        $pssc->title = 'Оплата единого социального взноса';
        $pssc->save();

        //Payment of a single tax
        $pst = new TaskType;
        $pst->abbr = 'pst';
        $pst->title = 'Оплата единого налога';
        $pst->save();
    }

}