<?php
require_once 'autoload.php';

use WordCounter\WordCounter;

if (
    $argc > 1 &&
    is_string($argv[1])
) {
    $counter = new WordCounter($argv[1]);
    $counter->count();
    foreach ($counter->getWords() as $word => $count) {
        echo "$word - $count" . PHP_EOL;
    }
} else {
    echo 'Введите строку' . PHP_EOL;
    die;
}