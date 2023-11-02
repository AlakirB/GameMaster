<?php 
require_once 'RandomGenerator.php';

class Dice implements RandomGenerator {
    public function __construct(
        private int $value = 1,
        private int $nbfaces = 6
        )
    {
        $this->chooseValue($value);
        if ($nbfaces < 1) {
            $this->nbfaces = 6;
        }
    }

    public function generateRandomValue() {
        $this->chooseValue(random_int(1, $this->nbfaces));
        return $this->getCurrentValue();
    }

    public function getCurrentValue() {
        return $this->value;
    }

    public function chooseValue(int $value) {
        $result = $value % ($this->nbfaces + 1);
        if ($result == 0) {
            $result++;
        }
        $this->value = $result;
    }
}