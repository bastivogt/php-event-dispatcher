<?php


namespace sevo\counter;

use sevo\events\EventDispatcher;

class Counter
{
    private int $start;
    private int $stop;
    private int $step;
    private int $count;
    private EventDispatcher $eventDispatcher;


    public function __construct(int $start = 0, int $stop = 10, int $step = 1)
    {
        $this->eventDispatcher = EventDispatcher::initialize();
        $this->reset($start, $stop, $step);
    }



    public function reset(int $start = 0, int $stop = 10, int $step = 1)
    {
        $this->start = $start;
        $this->stop = $stop;
        $this->step = $step;
        $this->count = $this->start;
    }


    public function run(): void
    {
        $this->count = $this->start;
        $this->eventDispatcher->dispatchEvent(new CounterEvent(CounterEvent::COUNTER_STARTED, $this, $this->count));
        for (; $this->count < $this->stop; $this->count += $this->step) {
            $this->eventDispatcher->dispatchEvent(new CounterEvent(CounterEvent::COUNTER_UPDATED, $this, $this->count));
        }
        $this->eventDispatcher->dispatchEvent(new CounterEvent(CounterEvent::COUNTER_FINISHED, $this, $this->count));
    }

    public function getEventDispatcher(): EventDispatcher
    {
        return $this->eventDispatcher;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
