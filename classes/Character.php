<?php

abstract class Character
{
    protected string $name;
    protected int $life;
    protected int $strength;
    protected int $agility;
    protected int $intelligence;
    protected int $charisma;

    // Constructeur
    public function __construct(
        string $name,
        int $life,
        int $strength,
        int $agility,
        int $intelligence,
        int $charisma
    ) {
        $this->name = $name;
        $this->life = $life;
        $this->strength = $strength;
        $this->agility = $agility;
        $this->intelligence = $intelligence;
        $this->charisma = $charisma;
    }

    // Getters
    public function getName(): string
    {
        return $this->name;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getAgility(): int
    {
        return $this->agility;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function getCharisma(): int
    {
        return $this->charisma;
    }

    // Setters
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setLife(int $life): void
    {
        $this->life = $life;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function setAgility(int $agility): void
    {
        $this->agility = $agility;
    }

    public function setIntelligence(int $intelligence): void
    {
        $this->intelligence = $intelligence;
    }

    public function setCharisma(int $charisma): void
    {
        $this->charisma = $charisma;
    }

    // Méthodes
    public function introduce(): string
    {
        return "Bonjour, je m'appelle {$this->name}.";
    }

    public function takeDamages(int $damages): void
    {
        $this->life -= $damages;
        if ($this->life < 0) {
            $this->life = 0;
        }
    }
}
