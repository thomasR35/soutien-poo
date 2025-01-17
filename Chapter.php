<?php

class Chapter
{
    private string $title;
    private string $content;
    private ?Chapter $nextChapter;

    public function __construct(string $title, string $content, ?Chapter $nextChapter = null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->nextChapter = $nextChapter;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getNextChapter(): ?Chapter
    {
        return $this->nextChapter;
    }

    public function setNextChapter(?Chapter $nextChapter): void
    {
        $this->nextChapter = $nextChapter;
    }
}
