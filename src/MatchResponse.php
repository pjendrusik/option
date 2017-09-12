<?php

require_once 'Option.php';
require_once 'Some.php';
require_once 'None.php';
require_once 'State.php';


final class MatchResponse
{
    /**
     * @param Option $option
     * @return int
     */
    public static function match(Option $option)
    {
        $val = $option->getOrElse(200);

        if($val instanceof State) {
            return $val->isDuplicate() ? 409 : 201;
        }

        return $val;
    }
}