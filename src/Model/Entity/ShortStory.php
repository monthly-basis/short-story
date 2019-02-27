<?php
namespace LeoGalleguillos\ShortStory\Model\Entity;

use LeoGalleguillos\ShortStory\Model\Entity as ShortStoryEntity;

class ShortStory
{
    protected $body;
    protected $shortStoryId;
    protected $title;
    protected $userId;

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

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setBody(string $body): ShortStoryEntity\ShortStory
    {
        $this->body = $body;
        return $this;
    }

    public function setShortStoryId(int $shortStoryId): ShortStoryEntity\ShortStory
    {
        $this->shortStoryId = $shortStoryId;
        return $this;
    }

    public function setTitle(string $title): ShortStoryEntity\ShortStory
    {
        $this->title = $title;
        return $this;
    }

    public function setUserId(int $userId): ShortStoryEntity\ShortStory
    {
        $this->userId = $userId;
        return $this;
    }
}
