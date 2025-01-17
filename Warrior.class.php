<?php
class Warrior extends Character
{
    private int $rage;

    public function __construct(string $name, int $rage)
    {
        parent::__construct($name, 150, 14, 12, 10, rand(8, 14));
        $this->rage = $rage;
    }

    public function getRage(): int
    {
        return $this->rage;
    }

    public function setRage(int $rage): void
    {
        $this->rage = $rage;
    }

    public function attack(): int
    {
        return rand(0, 1) * $this->strength;
    }
}
