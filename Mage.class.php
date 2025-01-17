<?php
class Mage extends Character
{
    private int $mana;

    public function __construct(string $name, int $mana)
    {
        parent::__construct($name, 100, 10, 12, 15, rand(8, 14));
        $this->mana = $mana;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function setMana(int $mana): void
    {
        $this->mana = $mana;
    }

    public function attack(): int
    {
        return rand(0, 1) * $this->intelligence;
    }
}
