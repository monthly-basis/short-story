<?php
namespace MonthlyBasis\ShortStory\Model\Service;

use Generator;
use MonthlyBasis\ShortStory\Model\Entity as ShortStoryEntity;
use MonthlyBasis\ShortStory\Model\Factory as ShortStoryFactory;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;

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
     * @yield ShortStoryEntity\ShortStory
     */
    public function getShortStories(): Generator
    {
        foreach ($this->shortStoryTable->select() as $array) {
            yield $this->shortStoryFactory->buildFromArray($array);
        }
    }
}
