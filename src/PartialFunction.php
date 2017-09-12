<?php

final class PartialFunction
{

    public function lift($value)
    {
        return Option::from($value);
    }

    /**
     * @param Closure $expression
     * @return Closure
     */
    public static function build(Closure $expression)
    {
        return Closure::fromCallable(function($a, $b) use ($expression) {
            return $expression($a, $b);
        });
    }
}