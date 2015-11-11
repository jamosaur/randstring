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

    public $adjective;
    public $animal;
    public $number;

    /**
     * Randstring constructor.
     * @param null $case (ucwords, ucfirst)
     * @param int $maxLength
     * @param int $min
     * @param int $max
     */
    public function __construct($case = null, $maxLength = 100, $min = 1, $max = 99)
    {
        $this->case         = $case;
        $this->maxLength    = $maxLength;
        $this->min          = $min;
        $this->max          = $max;
        $this->adjectives   = explode(PHP_EOL, file_get_contents(__DIR__.'/dictionaries/adjectives.txt'));
        $this->animals      = explode(PHP_EOL, file_get_contents(__DIR__.'/dictionaries/animals.txt'));
    }

    public function generateString()
    {
        $this->adjective    = $this->adjectives[mt_rand(0, count($this->adjectives)-1)];
        $this->animal       = $this->animals[mt_rand(0, count($this->animals)-1)];
        $this->number       = mt_rand($this->min, $this->max);
        switch ($this->case) {
            case 'ucfirst':
                $this->string   = ucfirst($this->adjective.$this->animal.$this->number);
                break;
            case 'ucwords':
                $this->string   = ucfirst($this->adjective).ucfirst($this->animal).ucfirst($this->number);
                break;
            default:
                $this->string   = $this->adjective.$this->animal.$this->number;
                break;
        }
    }

    public function generate()
    {
        $this->generateString();
        if (strlen($this->string) > $this->maxLength) {
            return $this->generate();
        }

        return $this->string;
    }
}
