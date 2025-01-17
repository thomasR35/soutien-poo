<?php
require_once __DIR__ . '/classes/Warrior.class.php';
require_once __DIR__ . '/classes/Mage.class.php';
require_once __DIR__ . '/classes/Rogue.class.php';
require_once 'Chapter.php';
require_once __DIR__ . '/classes/Character.php';

session_start();  // Démarrer la session

// Vérifier l'existence des personnages dans la session
if (!isset($_SESSION['characters'])) {
    // Si aucun personnage n'est enregistré, on les initialise
    $_SESSION['characters'] = [
        'warrior1' => ['name' => 'Varian', 'life' => 150, 'strength' => 14],
        'mage1' => ['name' => 'Khadgar', 'life' => 100, 'intelligence' => 15],
        'rogue1' => ['name' => 'Garona', 'life' => 100, 'agility' => 15],
        'rogue2' => ['name' => 'Valeera', 'life' => 100, 'agility' => 15],
        'warrior2' => ['name' => 'Garrosh', 'life' => 150, 'strength' => 14],
        'mage2' => ['name' => 'Jaina', 'life' => 100, 'intelligence' => 15],
    ];
}

// Créer les objets en utilisant les données de la session
$warrior1Data = $_SESSION['characters']['warrior1'];
$mage1Data = $_SESSION['characters']['mage1'];
$rogue1Data = $_SESSION['characters']['rogue1'];

$warrior1 = new Warrior($warrior1Data['name'], $warrior1Data['life']);
$mage1 = new Mage($mage1Data['name'], $mage1Data['life']);
$rogue1 = new Rogue($rogue1Data['name'], $rogue1Data['life']);

$warrior2Data = $_SESSION['characters']['warrior2'];
$mage2Data = $_SESSION['characters']['mage2'];
$rogue2Data = $_SESSION['characters']['rogue2'];

$warrior2 = new Warrior($warrior2Data['name'], $warrior2Data['life']);
$mage2 = new Mage($mage2Data['name'], $mage2Data['life']);
$rogue2 = new Rogue($rogue2Data['name'], $rogue2Data['life']);




class Story
{
    private array $characters = [];
    private array $chapters = [];

    public function addChapter(Chapter $chapter): void
    {
        $this->chapters[] = $chapter;
    }

    public function removeChapter(Chapter $chapter): void
    {
        $updatedChapters = [];

        foreach ($this->chapters as $ch) {
            if ($ch !== $chapter) {
                $updatedChapters[] = $ch;
            }
        }

        $this->chapters = $updatedChapters;
    }

    public function addCharacter(Character $character): void
    {
        $this->characters[] = $character;
    }

    public function removeCharacter(Character $character): void
    {
        $updatedCharacters = [];

        foreach ($this->characters as $ch) {
            if ($ch !== $character) {
                $updatedCharacters[] = $ch;
            }
        }

        $this->characters = $updatedCharacters;
    }
}

$story = new Story();

$warrior1 = new Warrior('Varian', 50);
$mage1 = new Mage('Khadgar', 120);
$rogue1 = new Rogue('Garona', 80);
$warrior2 = new Warrior('Garrosh', 50);
$mage2 = new Mage('Jaina', 120);
$rogue2 = new Rogue('Valeera', 80);

// Ajout des personnages à l'histoire
$story->addCharacter($mage1);
$story->addCharacter($mage2);
$story->addCharacter($warrior1);
$story->addCharacter($warrior2);
$story->addCharacter($rogue1);
$story->addCharacter($rogue2);

// Création du premier chapitre : Introduction
$introContent = $warrior1->introduce() . "</br>";
$introContent .= $mage1->introduce() . "</br>";
$introContent .= $rogue1->introduce() . "</br>";
$introContent .= $warrior2->introduce() . "</br>";
$introContent .= $mage2->introduce() . "</br>";
$introContent .= $rogue2->introduce() . "</br>";

$introChapter = new Chapter("Introduction", $introContent);
$story->addChapter($introChapter);

// Création du deuxième chapitre : Groupe 1
$group1 = [$mage1, $warrior1, $rogue1];
$group1Content = "Groupe 1 - Les Protecteurs :</br></br>";

foreach ($group1 as $character) {
    $group1Content .= $character->introduce() . "</br>";
    $group1Content .= "Vie: " . $character->getLife() . "</br>";
    $group1Content .= "Force: " . $character->getStrength() . "</br>";
    $group1Content .= "Agilité: " . $character->getAgility() . "</br>";
    $group1Content .= "Intelligence: " . $character->getIntelligence() . "</br>";
    $group1Content .= "Charisme: " . $character->getCharisma() . "</br></br>";

    // Action et mise à jour de la vie
    if ($character instanceof Warrior) {
        $group1Content .= $character->strike() . "</br></br>";
        // Mise à jour de la vie du personnage dans la session
        $_SESSION['characters']['warrior1']['life'] = $warrior1->getLife();
    } elseif ($character instanceof Mage) {
        $group1Content .= $character->cast() . "</br></br>";
        // Mise à jour de la vie du personnage dans la session
        $_SESSION['characters']['mage1']['life'] = $mage1->getLife();
    } elseif ($character instanceof Rogue) {
        $group1Content .= $character->stab() . "</br></br>";
        // Mise à jour de la vie du personnage dans la session
        $_SESSION['characters']['rogue1']['life'] = $rogue1->getLife();
    }
}

// Assurez-vous que la session est correctement enregistrée
session_commit();  // Enregistre définitivement les modifications dans la session




$group1Chapter = new Chapter("Les Protecteurs", $group1Content);
$introChapter->setNextChapter($group1Chapter);
$story->addChapter($group1Chapter);

// Création du troisième chapitre : Groupe 2
$group2 = [$mage2, $warrior2, $rogue2];
$group2Content = "Groupe 2 - Les Conquérants :</br></br>";

foreach ($group2 as $character) {
    $group2Content .= $character->introduce() . "</br>";
    $group2Content .= "Vie: " . $character->getLife() . "</br>";
    $group2Content .= "Force: " . $character->getStrength() . "</br>";
    $group2Content .= "Agilité: " . $character->getAgility() . "</br>";
    $group2Content .= "Intelligence: " . $character->getIntelligence() . "</br>";
    $group2Content .= "Charisme: " . $character->getCharisma() . "</br></br>";

    if ($character instanceof Warrior) {
        $group2Content .= $character->strike() . "</br></br>";
        $_SESSION['characters']['warrior2']['life'] = $warrior2->getLife();
    } elseif ($character instanceof Mage) {
        $group2Content .= $character->cast() . "</br></br>";
        $_SESSION['characters']['mage2']['life'] = $mage2->getLife();
    } elseif ($character instanceof Rogue) {
        $group2Content .= $character->stab() . "</br></br>";
        $_SESSION['characters']['rogue2']['life'] = $rogue2->getLife();
    }
}

$group2Chapter = new Chapter("Les Conquérants", $group2Content);
$group1Chapter->setNextChapter($group2Chapter);
$story->addChapter($group2Chapter);

// Affichage des chapitres pour test
$currentChapter = $introChapter;
while ($currentChapter !== null) {
    echo "Chapitre : " . $currentChapter->getTitle() . "</br>";
    echo $currentChapter->getContent() . "</br>";
    $currentChapter = $currentChapter->getNextChapter();
}
