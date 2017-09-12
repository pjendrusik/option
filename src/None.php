<?php

require_once 'Option.php';

final class None extends Option
{
    /**
     * @param Closure $expression
     * @return Option
     */
    final public function map(Closure $expression)
    {
        return new self();
    }

    public function getOrElse($default)
    {
        return $default;
    }

    /**
     * @param Option $option
     * @return Option
     */
    public function orElse(Option $option)
    {
        return $option;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isNotEmpty()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isDefined()
    {
        return false;
    }

    /**
     * @param Closure $expression
     * @return mixed
     */
    public function getOrCall(Closure $expression)
    {
        return $expression();
    }

    /**
     * @param Closure $expression
     * @return bool
     */
    public function ifDefined(Closure $expression)
    {
    }

    /**
     * @param Closure $expression
     * @return Option
     */
    public function flatMap(Closure $expression)
    {
        return $this;
    }

    /**
     * @param Closure $expression
     * @return Option
     */
    public function filter(Closure $expression)
    {
        return $this;
    }

    /**
     * @param Closure $expression
     * @return bool
     */
    public function exists(Closure $expression)
    {
        return false;
    }

    /**
     * @param Closure $expression
     * @return Option
     */
    public function filterNot(Closure $expression)
    {
        return $this;
    }

    /**
     * @param $value
     * @return bool
     */
    public function contains($value)
    {
        return false;
    }

    /**
     * @param $value
     * @param Closure $expression
     * @return mixed
     */
    public function fold($value, Closure $expression)
    {
         return $value;
    }

    /**
     * @param Closure $expression
     */
    public function _foreach(Closure $expression)
    {
    }

    /**
     * @param Closure $expression
     * @return bool
     */
    public function forall(Closure $expression)
    {
        return true;
    }

    /**
     * @return Iterator
     */
    public function productIterator()
    {
        return new EmptyIterator();
    }

    /**
     * @return array
     */
    public function toList()
    {
        return [$this];
    }

    public function collect($a, $b, Closure $expression)
    {
        return new self();
    }
}