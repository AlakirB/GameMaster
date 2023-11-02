<?php
require_once 'Dice.php';
require_once 'Coin.php';
require_once 'Deck.php';
require_once 'RandomGeneratorName.php';

class GameMaster {
    private array $dices;

    private Deck $deck1 = new Deck(1, 18, 3);
    private Deck $deck2 = new Deck();

    private Coin $coin1 = new Coin();
    private Coin $coin2 = new Coin();

    public function __construct(int $nbDices = 5) {
        for($i = 0; $i < $nbDices; $i++) {
            $this->dices[] = new Dice();
        }
    }

    public function addDice(Dice $newDice) {
        $this->dices[] = $newDice;
    }

    // return false if crit failed
    public function pleaseGiveMeACrit(int $critChance) {
        $critChance %= 101;
        if ($critChance == 100) {
            return true;
        }
        if ($critChance == 0) {
            return false;
        }

        switch (random_int(1,3)) {
            case 1:
                // Dice case
                // TODO
                break;

            case 2:
                // Deck case
                // TODO
                break;

            case 3:
                // Coin case
                $percent = 50; // flip a coin = 50%
                $nbIterations = $this->calculateNbIterations($critChance, $percent);
                $this->coin1->chooseNbThrow($nbIterations);
                if ($this->coin1->generateRandomValue()) {
                    return true;
                }
                return false;
                break;
        };
    }


    public function calculateNbIterations(int $critChance, int $percent) {
        $critChance %= 101;
        $percent %= 101;
        $chance = $percent / 100;
        $nbIterations = 1;
        while (($critChance/100) < $chance) {
            $chance *= $percent/100;
            $nbIterations++; 
        }
        return $nbIterations;
    }
}