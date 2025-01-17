<?php

require_once 'Character.php';

class Warrior extends Character
{
    private int $rage;

    // Constructeur
    public function __construct(string $name, int $rage)
    {
        // Appeler le constructeur de la classe parente
        parent::__construct(
            $name,
            150, // life
            14,  // strength
            12,  // agility
            10,  // intelligence
            rand(8, 14) // charisma
        );

        $this->rage = $rage;
    }

    // Getter pour $rage
    public function getRage(): int
    {
        return $this->rage;
    }

    // Setter pour $rage
    public function setRage(int $rage): void
    {
        $this->rage = $rage;
    }

    // Méthode strike
    public function strike(): string
    {
        $attackValue = (int)(rand(0, 100) / 100 * $this->strength);

        // Vérifier si la valeur d'attaque atteint la force maximale
        if ($attackValue >= $this->strength) {
            $attackValue *= 2;  // Doubler la valeur de l'attaque
            return "{$this->name} déclenche une attaque spéciale avec sa force maximale : {$attackValue}!";
        }

        // Vérifier si la valeur d'attaque est la plus basse (échec critique)
        if ($attackValue <= 0) {
            $this->life -= 10;
            $_SESSION['characters'][$this->name]['life'] = $this->life;
            return "{$this->name} se tranche le visage, ivre de rage ! Échec critique, -10 PV. Vie restante: {$this->life}.";
        }

        return "{$this->name} attaque avec sa force : {$attackValue}";
    }
}
