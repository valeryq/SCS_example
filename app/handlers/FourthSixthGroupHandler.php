<?php
use Carbon\Carbon;

/**
 * Class FourthSixthGroupHandler
 */
class FourthSixthGroupHandler implements IPayerGroupHandler
{

    /**
     * Calculate submission of declaration by year
     * @param $year
     * @param $month
     * @param $quarter
     * @return mixed
     */
    public function sd($year, $month, $quarter)
    {
        if (!empty($quarter)) {
            $month = $quarter * 3;
        }

        if (!empty($month)) {
            $date = new Carbon();
            $date->year = $year;
            $date->month = $month;
            $date->day = 1;

            $date = new Carbon($date->format('Y-m-t'));
            $date->addDays(2);
            $date->addDays(Config::get('scs_config.payer_group.46.sd'));
            return $date->format('Y-m-d');
        }
    }

    /**
     * Calculate payment of a single social contribution
     * @param $year
     * @param $month
     * @param $quarter
     * @return mixed
     */
    public function pssc($year, $month, $quarter)
    {
        return null;
    }

    /**
     * Calculate payment of a single tax
     * @param $year
     * @param $month
     * @param $quarter
     * @return mixed
     */
    public function pst($year, $month, $quarter)
    {
        if (!empty($quarter)) {
            $month = $quarter * 3;
        }

        if (!empty($month)) {
            $date = new Carbon();
            $date->year = $year;
            $date->month = $month + 1;
            $date->day = Config::get('scs_config.payer_group.46.pst');

            return $date->format('Y-m-d');
        }
    }
}