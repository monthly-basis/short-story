<?php
namespace MonthlyBasis\ShortStoryTest\Model\Factory;

use MonthlyBasis\ShortStory\Model\Entity as ShortStoryEntity;
use MonthlyBasis\ShortStory\Model\Factory as ShortStoryFactory;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;
use PHPUnit\Framework\TestCase;

class ShortStoryTest extends TestCase
{
    protected function setUp(): void
    {
        $this->shortStoryTableMock = $this->createMock(
            ShortStoryTable\ShortStory::class
        );

        $this->shortStoryFactory = new ShortStoryFactory\ShortStory(
            $this->shortStoryTableMock
        );
    }

    public function test_buildFromArray()
    {
        $array = [
            'body'           => 'the-body',
            'short_story_id' => '123',
            'title'          => 'the-title',
            'user_id'        => '456',
        ];
        $shortStoryEntity = (new ShortStoryEntity\ShortStory())
            ->setBody($array['body'])
            ->setShortStoryId($array['short_story_id'])
            ->setTitle($array['title'])
            ->setUserId($array['user_id'])
            ;
        $this->assertEquals(
            $shortStoryEntity,
            $this->shortStoryFactory->buildFromArray($array)
        );
    }
}
