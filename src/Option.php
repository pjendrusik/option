<?php

abstract class Option
{
    /**
     * @param $value
     * @param null $empty
     * @return None|Some
     */
    public static function from($value, $empty = null)
    {
        return ($value == $empty) ? new None() : new Some($value);
    }

    /**
     * @param Closure $expression
     * @return Option
     */
    abstract public function map(Closure $expression);

    /**
     * @param $value
     * @param Closure $expression
     * @return mixed
     */
    abstract public function fold($value, Closure $expression);

    /**
     * @param Closure $expression
     * @return Option
     */
    abstract public function flatMap(Closure $expression);

    /**
     * @param Closure $expression
     * @return Option
     */
    abstract public function filter(Closure $expression);

    /**
     * @param Closure $expression
     * @return Option
     */
    abstract public function filterNot(Closure $expression);

    /**
     * @param Closure $expression
     * @return bool
     */
    abstract public function exists(Closure $expression);

    /**
     * @param $default
     * @return mixed
     */
    abstract public function getOrElse($default);

    /**
     * @param $value
     * @return bool
     */
    abstract public function contains($value);

    /**
     * @param Closure $expression
     */
    abstract public function _foreach(Closure $expression);

    /**
     * @param Closure $expression
     * @return bool
     */
    abstract public function forall(Closure $expression);

    /**
     * @return Iterator
     */
    abstract public function productIterator();

    /**
     * @return bool
     */
    final public function nonEmpty()
    {
        return $this instanceof None;
    }

    /**
     * @param Option $option
     * @return Option
     */
    abstract public function orElse(Option $option);

    /**
     * @return null
     */
    final public function orNull()
    {
        return null;
    }

    /**
     * @return bool
     */
    abstract public function isEmpty();

    /**
     * @return bool
     */
    abstract public function isNotEmpty();

    /**
     * @return bool
     */
    abstract public function isDefined();

    /**
     * @param Closure $expression
     * @return Option
     */
    abstract public function getOrCall(Closure $expression);

    /**
     * @param Closure $expression
     * @return bool
     */
    abstract public function ifDefined(Closure $expression);

    /**
     * @return array
     */
    abstract public function toList();

    /**
     * @param $a
     * @param $b
     * @param Closure $expression
     * @return mixed
     */
    abstract public function collect($a, $b, Closure $expression);

}