<?php

class TaskService implements ITaskService
{
    /**
     * @var ITaskRepository
     */
    private $taskRepository;
    /**
     * @var ITaskTypeRepository
     */
    private $taskTypeRepository;
    /**
     * @var IPayerGroupRepository
     */
    private $payerGroupRepository;
    /**
     * @var ILanguageRepository
     */
    private $languageRepository;

    /**
     * @param ITaskRepository $taskRepository
     * @param ITaskTypeRepository $taskTypeRepository
     * @param IPayerGroupRepository $payerGroupRepository
     * @param ILanguageRepository $languageRepository
     */
    function __construct(ITaskRepository $taskRepository,
                         ITaskTypeRepository $taskTypeRepository,
                         IPayerGroupRepository $payerGroupRepository,
                         ILanguageRepository $languageRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->taskTypeRepository = $taskTypeRepository;
        $this->payerGroupRepository = $payerGroupRepository;
        $this->languageRepository = $languageRepository;
    }


    /**
     * Create new task by Payer group
     * @param $attributes - ['task_type' => 'sd|pssc|psx', 'payer_group' => '12|35|46', 'year', 'month', 'quarter'
     * 'descriptions' => ['lang' => 'ru|ua', 'description' => 'Подача декларации...']]
     * @return mixed
     * @throws Exception
     */
    public function create($attributes)
    {
        if ($attributes instanceof \Illuminate\Http\Request) {
            $attributes = $attributes->all();
        }

        $task = null;
        $taskType = $this->taskTypeRepository->findByAbbr(array_get($attributes, 'task_type'));
        $payerGroup = $this->payerGroupRepository->findByType(array_get($attributes, 'payer_group'));
        $groupHandler = $this->getGroupHandler(array_get($attributes, 'payer_group'));

        //Get date to
        $dateTo = $this->getDateTo(
            array_get($attributes, 'task_type'),
            array_get($attributes, 'year'),
            array_get($attributes, 'month'),
            array_get($attributes, 'quarter'),
            $groupHandler
        );

        $dateFrom = $this->getDateFrom(
            array_get($attributes, 'year'),
            array_get($attributes, 'month'),
            array_get($attributes, 'quarter')
        );


        DB::beginTransaction();
        try {
            $task = $this->taskRepository->create($dateFrom, $dateTo, $taskType, $payerGroup);

            foreach (array_get($attributes, 'descriptions') as $description) {
                $descriptionText = $description['description'] . ' ' . $dateTo;
                $language = $this->languageRepository->findByAbbr(array_get($description, 'lang'));
                $this->taskRepository->createDescription($task, $language, $descriptionText);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return $task;

    }

    /**
     * Get payer group handler
     * @param $payerGroup
     * @return FirstSecondGroupHandler
     */
    private function getGroupHandler($payerGroup)
    {
        if ($payerGroup == '12') {
            return new FirstSecondGroupHandler();
        }

        if ($payerGroup == '35') {
            return new ThirdFifthGroupHandler();
        }

        if ($payerGroup == '46') {
            return new FourthSixthGroupHandler();
        }
    }

    /**
     * Get date to
     * @param $taskType
     * @param $year
     * @param $month
     * @param $quarter
     * @param IPayerGroupHandler $groupHandler
     * @return mixed
     */
    private function getDateTo($taskType, $year, $month, $quarter, IPayerGroupHandler $groupHandler)
    {
        if ($taskType == 'sd') {
            return $groupHandler->sd($year, $month, $quarter);
        }

        if ($taskType == 'pssc') {
            return $groupHandler->pssc($year, $month, $quarter);
        }

        if ($taskType == 'pst') {
            return $groupHandler->pst($year, $month, $quarter);
        }
    }

    /**
     * Get first day quarter or month
     * @param $year
     * @param $month
     * @param $quarter
     * @return string
     */
    private function getDateFrom($year, $month, $quarter)
    {
        $date = new \Carbon\Carbon();
        $date->year = $year;
        if (!empty($quarter) || !empty($month)) {
            $date->month = $quarter ? ($quarter * 3 - 2) : $month;
        } else {
            $date->month = 1;
        }
        $date->day = 1;

        return $date->format('Y-m-d');
    }

    /**
     * Get list of tasks
     * @param $offset
     * @return mixed
     */
    public function getList($offset)
    {
        return $this->taskRepository->getList((int)$offset);
    }

    /**
     * Get list of tasks by criteria
     * @param $attributes
     * @return mixed
     */
    public function getListByCriteria($attributes)
    {
        //If attributes instance of Request
        if ($attributes instanceof \Illuminate\Http\Request) {
            $attributes = $attributes->all();
        }

        //For test only
        if (empty($attributes)) {
            return $this->getList(0);
        }

        //Get data
        $payerGroup = array_get($attributes, 'payer_group');
        $language = array_get($attributes, 'language');
        $year = array_get($attributes, 'year');
        $period = array_get($attributes, 'period');

        //Get data from repositories
        $payerGroup = $this->payerGroupRepository->findByType($payerGroup);
        $payerGroupId = $payerGroup ? $payerGroup->id : 0;
        $language = $this->languageRepository->findByAbbr($language);
        $languageId = $language ? $language->id : 0;

        //Calculates
        $quarter = substr($period, -1) == 'q' ? substr($period, 0, -1) : null;
        $month = $quarter ? null : $period;
        $year = $year ?: \Carbon\Carbon::now()->format('Y');

        $date = new \Carbon\Carbon();
        $date->year = $year;
        $date->day = 1;

        //If quarter != null
        if ($quarter) {
            $date->month = ($quarter * 3 - 2);
            $dateFrom = $date->format('Y-m-d');

            $date->month = ($quarter * 3);
            $dateTo = $date->format('Y-m-t');
        }

        //If month != null
        if ($month) {
            $date->month = $month;
            $dateFrom = $date->format('Y-m-d');
            $dateTo = $date->format('Y-m-t');
        }

        $dateTo = array_get($attributes, 'date_to') ?: !empty($dateTo) ? $dateTo : null;
        $dateFrom = array_get($attributes, 'date_from') ?: !empty($dateFrom) ? $dateFrom : null;

        return $this->taskRepository->getListByCriteria($payerGroupId, $dateFrom, $dateTo, $languageId);

    }


}