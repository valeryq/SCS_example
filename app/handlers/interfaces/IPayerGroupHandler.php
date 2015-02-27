<?php

/**
 * Interface IPayerGroupHandler
 */
interface IPayerGroupHandler
{
    /**
     * Calculate submission of declaration by year
     * @param $year
     * @param $month
     * @param $quarter
     * @return mixed
     */
    public function sd($year, $month, $quarter);

    /**
     * Calculate payment of a single social contribution
     * @param $year
     * @param $month
     * @param $quarter
     * @return mixed
     */
    public function pssc($year, $month, $quarter);

    /**
     * Calculate payment of a single tax
     * @param $year
     * @param $month
     * @param $quarter
     * @return mixed
     */
    public function pst($year, $month, $quarter);
}