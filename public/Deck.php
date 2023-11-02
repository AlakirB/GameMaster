<?php 
require_once 'RandomGenerator.php';

class Deck implements RandomGenerator {
    private int $nbCards;

    public function __construct(
        private int $value = 1,
        private int $nbValues = 13,
        private int $nbColors = 4
        )
    {  
        if ($nbValues < 1) {
            $this->nbValues = 13;
        }
        if ($nbColors < 1) {
            $this->nbColors = 4;
        }
        $this->nbCards = $this->nbValues * $this->nbColors;
    }

    public function generateRandomValue() {
        $this->chooseValue(random_int(1, $this->nbCards));
        return $this->getCurrentValue();
    }

    public function getCurrentValue() {
        return $this->value;
    }

    public function chooseValue(int $value) {
        $result = $value % ($this->nbCards + 1);
        if($result == 0) {
            $result++;
        }
        $this->value = $result;
    }
}