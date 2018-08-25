<?php
namespace LeoGalleguillos\ShortStory\Model\Entity;

class ShortStory
{
    protected $body;
    protected $shortStoryId;
    protected $title;

    public function getBody(): string
    {
        return $this->body;
    }

    public function getShortStoryId(): int
    {
        return $this->shortStoryId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
        return $this;
    }

    public function setShortStoryId(int $shortStoryId)
    {
        $this->shortStoryId = $shortStoryId;
        return $this;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }
}
