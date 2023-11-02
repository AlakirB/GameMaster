<?php 
require_once 'RandomGenerator.php';

class Coin implements RandomGenerator {
    public function __construct(
        private int $value = 0,
        private int $nbThrow = 1
        )
    {
        $this->chooseValue($value);
        $this->chooseNbThrow($nbThrow);
    }

    public function chooseNbThrow(int $nbThrow) {
        if ($nbThrow < 1)
        {
            $nbThrow = 1;
        }
        $this->nbThrow = $nbThrow;
    }

    public function generateRandomValue() {
        for($i = 0 ; $i < $this->nbThrow ; $i++) {
            if(!random_int(0,1)) {
                $this->chooseValue(0);
                return $this->getCurrentValue();
            }
        }
        $this->chooseValue(1);
        return $this->getCurrentValue();
    }

    public function getCurrentValue() {
        return $this->value;
    }

    public function chooseValue(int $value) {
        $this->value = $value % 2;
    }
}