<?php

require_once 'Option.php';

final class Some extends Option
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param Closure $expression
     * @return Option
     */
    final public function map(Closure $expression)
    {
        return new self($expression($this->value));
    }

    public function getOrElse($default)
    {
        return $this->value;
    }

    /**
     * @param Option $option
     * @return Option
     */
    public function orElse(Option $option)
    {
        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isNotEmpty()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isDefined()
    {
        return true;
    }

    /**
     * @param Closure $expression
     * @return mixed
     */
    public function getOrCall(Closure $expression)
    {
        return $this->value;
    }

    /**
     * @param Closure $expression
     * @return mixed
     */
    public function ifDefined(Closure $expression)
    {
        return $expression($this->value);
    }

    /**
     * @param Closure $expression
     * @return Option
     */
    public function flatMap(Closure $expression)
    {
        $val = $expression($this->value);

        if($val instanceof Option) {
            return $val;
        }

        trigger_error('Expression should return Option instance');

        return new None();
    }

    /**
     * @param Closure $expression
     * @return Option
     */
    public function filter(Closure $expression)
    {
        if(true === $expression($this->value)) {
            return $this;
        }

        return new None();
    }

    /**
     * @param Closure $expression
     * @return bool
     */
    public function exists(Closure $expression)
    {
        return true === $expression($this->value) ?: false;
    }

    /**
     * @param Closure $expression
     * @return Option
     */
    public function filterNot(Closure $expression)
    {
        if(false === $expression($this->value)) {
            return $this;
        }

        return new None();
    }

    /**
     * @param $value
     * @return bool
     */
    public function contains($value)
    {
        return $this->value === $value;
    }

    /**
     * @param $value
     * @param Closure $expression
     * @return mixed
     */
    public function fold($value, Closure $expression)
    {
        return $expression($this->value);
    }

    /**
     * @param Closure $expression
     */
    public function _foreach(Closure $expression)
    {
        $expression($this->value);
    }

    /**
     * @param Closure $expression
     * @return bool
     */
    public function forall(Closure $expression)
    {
        return $this->isEmpty() || $expression($this->value);
    }

    /**
     * @return Iterator
     */
    public function productIterator()
    {
        return new ArrayIterator([$this->value]);
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
        return $expression($a, $b, $this->value);
    }
}