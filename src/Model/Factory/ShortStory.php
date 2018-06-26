<?php
namespace LeoGalleguillos\ShortStory\Model\Factory;

use LeoGalleguillos\ShortStory\Model\Entity as ShortStoryEntity;

class ShortStory
{
    public function __construct(
        ShortStoryTable $shortStoryTable
    ) {
        $this->shortStoryTable = $shortStoryTable;
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return ShortStoryEntity\ShortStory
     */
    public function buildFromArray(array $array) : ShortStoryEntity\ShortStory
    {
        $shortStoryEntity = new ShortStoryEntity\ShortStory();

        return $shortStoryEntity;
    }
}
