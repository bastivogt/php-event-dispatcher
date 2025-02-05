<?php

namespace sevo\events;

class EventDispatcher
{
    protected array $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    public static function initialize()
    {
        return new EventDispatcher();
    }


    public function getListeners(): array
    {
        return $this->listeners;
    }

    public function hasListener(string $type): bool
    {
        foreach ($this->listeners as $item) {
            if ($item["type"] === $type) {
                return true;
            }
        }
        return false;
    }


    public function addListener(string $type, callable $listener): bool
    {
        if (!$this->hasListener($type)) {
            $this->listeners[] = ["type" => $type, "listener" => $listener];
            return true;
        }
        return false;
    }


    public function removeListener(string $type): bool
    {
        // if ($this->hasListener($type)) {
        //     for ($i = 0; $i < count($this->listeners); $i++) {
        //         if ($this->listeners[$i]["type"] === $type) {
        //             array_splice($this->listeners, $i, 1);
        //             return true;
        //         }
        //     }
        // }
        // return false;
        if ($this->hasListener($type)) {
            foreach ($this->listeners as $key => $value) {
                if ($value["type"] === $type) {
                    unset($this->listeners[$key]);
                }
            }
        }
        return false;
    }


    public function dispatchEvent(Event $event): bool
    {

        foreach ($this->listeners as $item) {
            if ($item["type"] === $event->getType()) {
                $item["listener"]($event);
                return true;
            }
        }


        return false;
    }
}
