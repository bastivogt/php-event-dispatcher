<?php

include "./inc/autoload.php";


$counter = new \counter\Counter();

$counter->getEventDispatcher()->addListener(\counter\CounterEvent::COUNTER_STARTED, function ($e) {
    echo $e->getType() . " sender: " . $e->getSender() .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

$counter->getEventDispatcher()->addListener(\counter\CounterEvent::COUNTER_UPDATED, function ($e) {
    echo $e->getType() . " sender: " . $e->getSender() .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

$counter->getEventDispatcher()->addListener(\counter\CounterEvent::COUNTER_FINISHED, function ($e) {
    echo $e->getType() . " sender: " . $e->getSender() .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

// $counter->getEventDispatcher()->removeListener(CounterEvent::COUNTER_UPDATED);

$counter->run();
