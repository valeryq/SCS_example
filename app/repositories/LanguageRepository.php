<?php

/**
 * Class LanguageRepository
 */
class LanguageRepository implements ILanguageRepository
{
    /**
     * @var Language
     */
    private $language;

    /**
     * @param Language $language
     */
    function __construct(Language $language)
    {
        $this->language = $language;
    }


    /**
     * Find task type by abbr
     * @param $abbr
     * @return mixed
     */
    public function findByAbbr($abbr)
    {
        return $this->language->where('abbr', $abbr)->first();
    }
}