<?php
namespace LeoGalleguillos\ShortStory\Model\Service;

use LeoGalleguillos\ShortStory\Model\Table as ShortStoryTable;

class ShortStories
{
    public function __construct(
        ShortStoryTable\ShortStory $shortStoryTable
    ) {
        $this->shortStoryTable = $shortStoryTable;
    }

    public function getShortStories()
    {
    }
}
