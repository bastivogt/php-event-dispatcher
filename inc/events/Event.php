<?php

namespace events;

class Event
{
    protected object $sender;
    protected string $type;

    public function __construct(string $type, object $sender)
    {
        $this->type = $type;
        $this->sender = $sender;
    }

    public function getSender(): object
    {
        return $this->sender;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function __toString()
    {
        return "Event";
    }
}
