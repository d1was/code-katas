<?php

namespace App;

class LightGrid
{
    private $storage = [];

    public function __construct($numberOfRows, $numOfCols)
    {
        for ($i=0; $i < $numberOfRows; $i++)
        {
            for($j=0; $j < $numOfCols; $j++)
            {
                $this->storage[$i][$j] = 0;
            }
        }
    }

    public function get($row, $col)
    {
        return $this->storage[$row][$col];
    }

    public function turnOn($from, $to)
    {
        for($i=$from[0]; $i <= $to[0]; $i++) {
            for($j=$from[1]; $j <= $to[1]; $j++) {
               $this->storage[$i][$j] = 1;
            }
        }
    }

    public function turnsOff($from, $to)
    {
        for($i=$from[0]; $i <= $to[0]; $i++) {
            for($j=$from[1]; $j <= $to[1]; $j++) {
                $this->storage[$i][$j] = 0;
            }
        }
    }

    public function toggleLight($from, $to)
    {
        for($i=$from[0]; $i <= $to[0]; $i++) {
            for($j=$from[1]; $j <= $to[1]; $j++) {
                $this->storage[$i][$j] = 1 - $this->storage[$i][$j];
            }
        }
    }

    public function numberOfLightsLit()
    {
        $numberOfTurnedLights = 0;

        for($i=0; $i < sizeof($this->storage); $i++) {
            for($j=0; $j < sizeof($this->storage[0]); $j++) {
                if($this->get($i, $j) === 1) {
                    $numberOfTurnedLights++;
                }
            }
        }

        return $numberOfTurnedLights;
    }


}