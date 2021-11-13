<?php
namespace MonthlyBasis\ShortStory\Model\Factory;

use MonthlyBasis\ShortStory\Model\Entity as ShortStoryEntity;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;

class ShortStory
{
    public function __construct(
        ShortStoryTable\ShortStory $shortStoryTable
    ) {
        $this->shortStoryTable = $shortStoryTable;
    }

    public function buildFromArray(array $array): ShortStoryEntity\ShortStory
    {
        $shortStoryEntity = (new ShortStoryEntity\ShortStory())
            ->setBody($array['body'])
            ->setShortStoryId($array['short_story_id'])
            ->setTitle($array['title'])
            ->setUserId((int) $array['user_id'])
            ;

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
