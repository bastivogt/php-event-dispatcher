<?php

class CounterEvent extends Event
{

    public const COUNTER_STARTED = "COUNTER_STARTED";
    public const COUNTER_UPDATED = "COUNTER_UPDATED";
    public const COUNTER_FINISHED = "COUNTER_FINISHED";

    protected int $count;

    public function __construct(string $type, object $sender, int $count)
    {
        parent::__construct($type, $sender);
        $this->count = $count;
    }

    public function getCount(): int
    {
        return $this->count;
    }


    public function __toString()
    {
        return "CounterEvent";
    }
}
