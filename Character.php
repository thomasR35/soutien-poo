<?php
abstract class Character
{
    protected string $name;
    protected int $life;
    protected int $strength;
    protected int $agility;
    protected int $intelligence;
    protected int $charisma;

    public function __construct(string $name, int $life, int $strength, int $agility, int $intelligence, int $charisma)
    {
        $this->name = $name;
        $this->life = $life;
        $this->strength = $strength;
        $this->agility = $agility;
        $this->intelligence = $intelligence;
        $this->charisma = $charisma;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function introduce(): string
    {
        return "Bonjour, je m'appelle {$this->name}.";
    }

    public function takeDamages(int $damages): void
    {
        $this->life -= $damages;
    }

    abstract public function attack(): int;
}
