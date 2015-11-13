<?php

namespace Jamosaur\Randstring;

class Randstring
{
    private $adjectives;
    private $animals;

    private $min;
    private $max;
    private $case;
    private $maxLength;

    private $string;

    public $combinations = [];

    private $first;
    private $second;

    public $adjective;
    public $animal;
    public $number;

    /**
     * Randstring constructor.
     *
     * @param null $case      (ucwords, ucfirst|sentence)
     * @param int  $maxLength
     * @param int  $min
     * @param int  $max
     */
    public function __construct($case = null, $maxLength = 100, $min = 1, $max = 99)
    {
        $this->case = $case;
        $this->maxLength = $maxLength;
        $this->min = $min;
        $this->max = $max;
        $this->adjectives = explode(PHP_EOL, file_get_contents(__DIR__.'/dictionaries/adjectives.txt'));
        $this->animals = explode(PHP_EOL, file_get_contents(__DIR__.'/dictionaries/animals.txt'));
    }

    /**
     * @param null $first
     * @param null $second
     */
    private function generateNumbers($first = null, $second = null)
    {
        $this->first = ($first) ? $first : mt_rand(0, count($this->adjectives)-1);
        $this->second = ($second) ? $second : mt_rand(0, count($this->animals)-1);
        $this->number = mt_rand($this->min, $this->max);
        if (array_key_exists($this->first.'.'.$this->second.'.'.$this->number, $this->combinations)) {
            $this->generateNumbers($this->first, $this->second);
        }
        $this->combinations[$this->first.'.'.$this->second.'.'.$this->number] = 1;
    }

    /**
     * Generate a string.
     */
    private function generateString()
    {
        $this->generateNumbers();
        $this->adjective = $this->adjectives[$this->first];
        $this->animal = $this->animals[$this->second];
        switch ($this->case) {
            case 'ucfirst':
                $this->string = ucfirst($this->adjective.$this->animal.$this->number);
                break;
            case 'ucwords':
            case 'sentence':
                $this->string = ucfirst($this->adjective).ucfirst($this->animal).ucfirst($this->number);
                break;
            default:
                $this->string = $this->adjective.$this->animal.$this->number;
                break;
        }
    }

    /**
     * @return mixed
     */
    public function generate()
    {
        $this->generateString();
        if (strlen($this->string) > $this->maxLength) {
            return $this->generate();
        }

        return $this->string;
    }
}
