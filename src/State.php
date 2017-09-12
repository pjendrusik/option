<?php

final class State
{

    const LEAD_TYPE = 'lead';
    const DUPLICATE_TYPE = 'duplicate';

    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isDuplicate()
    {
        return self::DUPLICATE_TYPE === $this->type;
    }
}