<?php
class Rogue extends Character
{
    private int $energy;

    public function __construct(string $name, int $energy)
    {
        parent::__construct($name, 100, 12, 15, 11, rand(8, 14));
        $this->energy = $energy;
    }

    public function getEnergy(): int
    {
        return $this->energy;
    }

    public function setEnergy(int $energy): void
    {
        $this->energy = $energy;
    }

    public function attack(): int
    {
        return rand(0, 1) * $this->agility;
    }
}
