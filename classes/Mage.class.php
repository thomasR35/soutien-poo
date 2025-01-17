<?php

require_once 'Character.php';

class Mage extends Character
{
    private int $mana;

    // Constructeur
    public function __construct(string $name, int $mana)
    {
        // Appeler le constructeur de la classe parente
        parent::__construct(
            $name,
            100, // life
            10,  // strength
            12,  // agility
            15,  // intelligence
            rand(8, 14) // charisma
        );

        $this->mana = $mana;
    }

    // Getter pour $mana
    public function getMana(): int
    {
        return $this->mana;
    }

    // Setter pour $mana
    public function setMana(int $mana): void
    {
        $this->mana = $mana;
    }

    // Méthode cast
    public function cast(): string
    {
        $attackValue = (int)(rand(0, 100) / 100 * $this->intelligence);

        // Vérifier si la valeur d'attaque atteint l'intelligence maximale
        if ($attackValue >= $this->intelligence) {
            $attackValue *= 2;  // Doubler la valeur de l'attaque
            $_SESSION['characters'][$this->name]['life'] = $this->life;
            return "{$this->name} lance un sort spécial avec son intelligence maximale : {$attackValue}!";
        }

        // Vérifier si la valeur d'attaque est la plus basse (échec critique)
        if ($attackValue <= 0) {
            $this->life -= 10;  // Retirer 10 points de vie en cas d'échec critique
            return "{$this->name} se givre le bout des doigts ! Échec critique, -10 PV. Vie restante: {$this->life}.";
        }

        return "{$this->name} lance un sort avec son intelligence : {$attackValue}";
    }
}
