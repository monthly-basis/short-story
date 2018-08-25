<?php
namespace LeoGalleguillos\ShortStory\Model\Service;

use Generator;
use LeoGalleguillos\ShortStory\Model\Entity as ShortStoryEntity;
use LeoGalleguillos\ShortStory\Model\Factory as ShortStoryFactory;
use LeoGalleguillos\ShortStory\Model\Table as ShortStoryTable;

class ShortStories
{
    public function __construct(
        ShortStoryFactory\ShortStory $shortStoryFactory,
        ShortStoryTable\ShortStory $shortStoryTable
    ) {
        $this->shortStoryFactory = $shortStoryFactory;
        $this->shortStoryTable   = $shortStoryTable;
    }

    /**
     * Get short stories.
     *
     * @yield ShortStoryEntity\ShortStory
     * @return Generator
     */
    public function getShortStories(): Generator
    {
        foreach ($this->shortStoryTable->select() as $array) {
            yield $this->shortStoryFactory->buildFromArray($array);
        }
    }
}
