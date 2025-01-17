<?php
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
        $this->chapters = array_filter($this->chapters, fn($ch) => $ch !== $chapter);
    }

    public function addCharacter(Character $character): void
    {
        $this->characters[] = $character;
    }

    public function removeCharacter(Character $character): void
    {
        $this->characters = array_filter($this->characters, fn($ch) => $ch !== $character);
    }
}
$warrior = new Warrior("Grom", 50);
$mage = new Mage("Elara", 200);
$rogue = new Rogue("Sylas", 80);

echo $warrior->introduce() . "\n";
echo $mage->introduce() . "\n";
echo $rogue->introduce() . "\n";

echo "Warrior attack: " . $warrior->attack() . "\n";
echo "Mage attack: " . $mage->attack() . "\n";
echo "Rogue attack: " . $rogue->attack() . "\n";
