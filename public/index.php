<?php
/*
use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
*/

require_once 'GameMaster.php';

$de = new Dice();

echo '<p>Dé : ', $de->generateRandomValue(), '</p>';

$coin = new Coin(1,2);
$coin->chooseNbThrow(2);

echo '<p>Pièce : ', $coin->generateRandomValue(), '</p>';

$deck = new Deck();

echo '<p>Deck : ', $deck->generateRandomValue(), '</p>';

