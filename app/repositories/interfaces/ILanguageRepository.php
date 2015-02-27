<?php

/**
 * Interface ILanguageRepository
 */
interface ILanguageRepository
{
    /**
     * Find language by abbr
     * @param $abbr
     * @return mixed
     */
    public function findByAbbr($abbr);
}