<?php

namespace Tests;

use Diwas\BowlingGame;

class BowlingGameTest extends \PHPUnit\Framework\TestCase
{
    private BowlingGame $bowlingGame;

    public function setUp(): void
    {
        $this->bowlingGame = new BowlingGame();
    }

    public function testStrike()
    {
        $this->rollStrike();
        $this->rollMany(2, 4);

        $this->rollMany(8, 0);
        $this->assertEquals(26, $this->bowlingGame->score());
    }

    public function testSpare()
    {
        $this->rollSpare();
        $this->bowlingGame->roll(3);

        $this->rollMany(10, 0);

        $this->assertEquals(16, $this->bowlingGame->score());
    }

    public function testGutterGame()
    {
        $this->rollMany(20, 0);

        $this->assertEquals(0, $this->bowlingGame->score());
    }

    public function testAllOneScore()
    {
        $this->rollMany(20, 1);

        $this->assertEquals(10, $this->bowlingGame->score());
    }

    public function testPerfectGame()
    {
        $this->rollMany(12, 10);

        $this->assertEquals(300, $this->bowlingGame->score());
    }

    public function rollMany($times, $pins)
    {
        for($i=0; $i < $times; $i++)
        {
            $this->bowlingGame->roll($pins);
        }
    }


    public function rollStrike()
    {
        $this->bowlingGame->roll(10);
    }

    private function rollSpare()
    {
        $this->bowlingGame->roll(5);
        $this->bowlingGame->roll(5);

    }


}