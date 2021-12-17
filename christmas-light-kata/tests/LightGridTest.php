<?php

namespace Tests;

use App\LightGrid;
use PHPUnit\Framework\TestCase;

class LightGridTest extends TestCase
{
    private $lightGrid;
    private $col;
    private $row;

    public function setUp(): void
    {
        $this->col = 1000;
        $this->row = 1000;
        $this->lightGrid = new LightGrid($this->col, $this->row);

    }

    public function test_it_can_get_some_box_value_in_the_grid()
    {
        $this->assertSame(0, $this->lightGrid->get(200, 250));
    }

    public function test_it_turns_some_lights()
    {
        $from = [499, 499];
        $to = [500, 500];

        $this->lightGrid->turnOn($from, $to);

        $numberOfTurnedLights = $this->lightGrid->numberOfLightsLit();
        $this->assertEquals(4, $numberOfTurnedLights);
    }

    public function test_it_turns_off_some_lights()
    {
        $from = [499, 499];
        $to = [500, 500];

        $this->lightGrid->turnOn($from, $to);
        $this->lightGrid->turnsOff($from, $to);

        $numberOfTurnedLights = $this->lightGrid->numberOfLightsLit();
        $this->assertEquals(0, $numberOfTurnedLights);
    }

    public function test_it_toggles_some_lights()
    {
        $from = [499, 499];
        $to = [500, 500];

        $this->lightGrid->turnOn($from, $to);
        $numberOfTurnedLightsBeforeToggling = $this->lightGrid->numberOfLightsLit();

        $this->lightGrid->toggleLight([0, 0], [$this->row-1, $this->col-1]);
        $numberOfTurnedLightsAfter = $this->lightGrid->numberOfLightsLit();

        $this->assertEquals($this->row * $this->col - $numberOfTurnedLightsBeforeToggling, $numberOfTurnedLightsAfter);
    }


    public function test_number_of_lights_lit()
    {
        $from = [499, 499];
        $to = [500, 500];

        $this->lightGrid->turnOn($from, $to);

        $this->assertSame(4, $this->lightGrid->numberOfLightsLit());

    }


}