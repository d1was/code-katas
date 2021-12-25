<?php

namespace Diwas;

class BowlingGame
{
    private array $rolls = [];
    private int $currentRoll = 0;

    public function roll(int $pins): void
    {
        $this->rolls[$this->currentRoll++] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $framingIndex = 0;

        for ( $frame = 0; $frame < 10; $frame++) {
            if($this->isStrike($framingIndex)) {
                $score += 10 + $this->strikeBonus($framingIndex);
                $framingIndex++;
            } elseif ($this->isSpare($framingIndex)) {
                $score += 10 + $this->spareBonus($framingIndex);
                $framingIndex += 2;
            } else {
                $score += $this->rolls[$framingIndex];
                $framingIndex++;
            }
        }
        return $score;
    }

    private function isStrike($framingIndex)
    {
        return $this->rolls[$framingIndex] === 10;
    }

    private function isSpare($framingIndex)
    {
        return $this->rolls[$framingIndex] + $this->rolls[$framingIndex + 1] == 10;
    }

    private function strikeBonus($framingIndex)
    {
        return $this->rolls[$framingIndex + 1] + $this->rolls[$framingIndex + 2];
    }

    private function spareBonus($framingIndex)
    {
        return $this->rolls[$framingIndex + 2];
    }


}