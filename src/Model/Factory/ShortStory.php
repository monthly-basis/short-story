<?php
namespace LeoGalleguillos\ShortStory\Model\Factory;

use LeoGalleguillos\ShortStory\Model\Entity as ShortStoryEntity;
use LeoGalleguillos\ShortStory\Model\Table as ShortStoryTable;

class ShortStory
{
    public function __construct(
        ShortStoryTable\ShortStory $shortStoryTable
    ) {
        $this->shortStoryTable = $shortStoryTable;
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return ShortStoryEntity\ShortStory
     */
    public function buildFromArray(array $array): ShortStoryEntity\ShortStory
    {
        $shortStoryEntity = new ShortStoryEntity\ShortStory();
        $shortStoryEntity->setBody($array['body'])
                         ->setShortStoryId($array['short_story_id'])
                         ->setTitle($array['title']);

        return $shortStoryEntity;
    }

    public function buildFromShortStoryId(
        int $shortStoryId
    ): ShortStoryEntity\ShortStory {
        return $this->buildFromArray(
            $this->shortStoryTable->selectWhereShortStoryId($shortStoryId)
        );
    }
}
