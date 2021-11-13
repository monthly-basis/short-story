<?php
namespace MonthlyBasis\ShortStoryTest\Model\Entity;

use DateTime;
use MonthlyBasis\ShortStory\Model\Entity as ShortStoryEntity;
use PHPUnit\Framework\TestCase;

class ShortStoryTest extends TestCase
{
    protected function setUp(): void
    {
        $this->shortStoryEntity = new ShortStoryEntity\ShortStory();
    }

    public function test_settersAndGetters()
    {
        $body = 'the body of the short story';
        $this->assertSame(
            $this->shortStoryEntity,
            $this->shortStoryEntity->setBody($body)
        );
        $this->assertSame(
            $body,
            $this->shortStoryEntity->getBody()
        );

        $deletedDatetime = new DateTime();
        $this->assertSame(
            $this->shortStoryEntity,
            $this->shortStoryEntity->setDeletedDatetime($deletedDatetime)
        );
        $this->assertSame(
            $deletedDatetime,
            $this->shortStoryEntity->getDeletedDateTime()
        );

        $deletedReason = 'inappropriate content';
        $this->assertSame(
            $this->shortStoryEntity,
            $this->shortStoryEntity->setDeletedReason($deletedReason)
        );
        $this->assertSame(
            $deletedReason,
            $this->shortStoryEntity->getDeletedReason()
        );

        $deletedUserId = 2718;
        $this->assertSame(
            $this->shortStoryEntity,
            $this->shortStoryEntity->setDeletedUserId($deletedUserId)
        );
        $this->assertSame(
            $deletedUserId,
            $this->shortStoryEntity->getDeletedUserId()
        );

        $shortStoryId = 98765;
        $this->assertSame(
            $this->shortStoryEntity,
            $this->shortStoryEntity->setShortStoryId($shortStoryId)
        );
        $this->assertSame(
            $shortStoryId,
            $this->shortStoryEntity->getShortStoryId()
        );

        $title = 'The Title of the Short Story';
        $this->assertSame(
            $this->shortStoryEntity,
            $this->shortStoryEntity->setTitle($title)
        );
        $this->assertSame(
            $title,
            $this->shortStoryEntity->getTitle()
        );

        $userId = 123;
        $this->assertSame(
            $this->shortStoryEntity,
            $this->shortStoryEntity->setUserId($userId)
        );
        $this->assertSame(
            $userId,
            $this->shortStoryEntity->getUserId()
        );
    }
}
