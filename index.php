<?php

include "./inc/autoload.php";


use sevo\counter\CounterEvent;
use sevo\counter\Counter;


$counter = new Counter();

$counter->getEventDispatcher()->addListener(CounterEvent::COUNTER_STARTED, function ($e) {
    echo $e->getType() . " sender: " . get_class($e->getSender()) .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

$counter->getEventDispatcher()->addListener(CounterEvent::COUNTER_UPDATED, function ($e) {
    echo $e->getType() . " sender: " . get_class($e->getSender()) .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

$counter->getEventDispatcher()->addListener(CounterEvent::COUNTER_FINISHED, function ($e) {
    echo $e->getType() . " sender: " . get_class($e->getSender()) .  " sender->count: " . $e->getSender()->getCount() . " count: " . $e->getCount() . "\n";
});

// $counter->getEventDispatcher()->removeListener(CounterEvent::COUNTER_UPDATED);

$counter->run();
