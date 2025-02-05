<?php

include "inc/all.php";

$counter = new Counter();

$counter->getEventDispatcher()->addListener(CounterEvent::COUNTER_STARTED, function ($e) {
    echo $e->getType() . " sender: " . $e->getSender() .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

$counter->getEventDispatcher()->addListener(CounterEvent::COUNTER_UPDATED, function ($e) {
    echo $e->getType() . " sender: " . $e->getSender() .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

$counter->getEventDispatcher()->addListener(CounterEvent::COUNTER_FINISHED, function ($e) {
    echo $e->getType() . " sender: " . $e->getSender() .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

// $counter->getEventDispatcher()->removeListener(CounterEvent::COUNTER_UPDATED);

$counter->run();
