<?php

/**
 * Class TasksTableSeeder
 */
class TasksTableSeeder extends Seeder
{
    /**
     * @var TaskService
     */
    private $taskService;

    /**
     * @param TaskService $taskService
     */
    function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }


    /**
     * Run the database payer groups seed.
     *
     * @return void
     */
    public function run()
    {
        //*** ПЕРВАЯ И ВТОРАЯ ГРУППЫ ***//
        //Сдать налоговую декларацию за 2014 год ­ с 1 января 2015 до 10 февраля 2015
        $this->taskService->create([
            'task_type' => 'sd',
            'payer_group' => '12',
            'year' => 2014,
//            'month' => 3,
//            'quarter' => 3,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Сдать налоговую декларацию за 2014 год до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Здати податкову декларацію за 2014 до'
                ],
            ]
        ]);

        //Оплатить ЕСВ за III квартал 2014 ­ до 20 октября 2014
        $this->taskService->create([
            'task_type' => 'pssc',
            'payer_group' => '12',
            'year' => 2014,
            //'month' => 2,
            'quarter' => 3,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Оплатить ЕСВ за III квартал 2014 - до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Оплатити ЄСВ за III квартал 2014 - до'
                ],
            ]
        ]);

        //Оплатить ЕСВ за декабрь 2014 ­ до 20 января 2014
        $this->taskService->create([
            'task_type' => 'pssc',
            'payer_group' => '12',
            'year' => 2014,
            'month' => 12,
//            'quarter' => 3,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Оплатить ЕСВ за декабрь 2014 - до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Оплатити ЄСВ за грудень 2014 - до'
                ],
            ]
        ]);

        //Оплатить ЕН за январь 2015 ­ до 20 января 2015
        $this->taskService->create([
            'task_type' => 'pst',
            'payer_group' => '12',
            'year' => 2015,
            'month' => 1,
//            'quarter' => 3,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Оплатить ЕН за январь 2015 - до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Оплатити ЄП за сiчень 2015 - до'
                ],
            ]
        ]);


        //*** ТРЕТЬЯ И ПЯТАЯ ГРУППЫ ***//
        //Сдать налоговую декларацию за первое полугодие 2014 ­ с 1 июля 2014 до 11 августа 2014
        $this->taskService->create([
            'task_type' => 'sd',
            'payer_group' => '35',
            'year' => 2014,
//            'month' => 1,
            'quarter' => 2,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Сдать налоговую декларацию за первое полугодие 2014 ­ с 1 июля 2014 до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Здати податкову декларацію за перше півріччя 2014 - з 1 липня 2014 до'
                ],
            ]
        ]);

        //Оплатить ЕСВ за декабрь 2014 ­ до 20 января 2014
        $this->taskService->create([
            'task_type' => 'pssc',
            'payer_group' => '35',
            'year' => 2014,
            'month' => 12,
//            'quarter' => 3,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Оплатить ЕСВ за декабрь 2014 - до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Оплатити ЄСВ за грудень 2014 - до'
                ],
            ]
        ]);

        //Оплатить ЕН за II квартал 2014 ­ до 19 августа 2014
        $this->taskService->create([
            'task_type' => 'pst',
            'payer_group' => '35',
            'year' => 2014,
//            'month' => 1,
            'quarter' => 2,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Оплатить ЕН за II квартал 2014 ­ до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Оплатити ЄП за II квартал 2014 - до'
                ],
            ]
        ]);


        //*** ЧЕТВЕРТАЯ И ШЕСТАЯ ГРУППЫ ***//
        //Сдать налоговую декларацию за первое полугодие 2014 ­ с 1 июля 2014 до 11 августа 2014
        $this->taskService->create([
            'task_type' => 'sd',
            'payer_group' => '46',
            'year' => 2014,
//            'month' => 1,
            'quarter' => 2,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Сдать налоговую декларацию за первое полугодие 2014 ­ с 1 июля 2014 до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Здати податкову декларацію за перше півріччя 2014 - з 1 липня 2014 до'
                ],
            ]
        ]);

        //Оплатить ЕН за II квартал 2014 ­ до 19 августа 2014
        $this->taskService->create([
            'task_type' => 'pst',
            'payer_group' => '46',
            'year' => 2014,
//            'month' => 1,
            'quarter' => 2,
            'descriptions' => [
                [
                    'lang' => 'ru',
                    'description' => 'Оплатить ЕН за II квартал 2014 ­ до'
                ],
                [
                    'lang' => 'ua',
                    'description' => 'Оплатити ЄП за II квартал 2014 - до'
                ],
            ]
        ]);

    }

}