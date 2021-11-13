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
        $userId = 123;
        $this->assertSame(
            $this->shortStoryEntity,
            $this->shortStoryEntity->setUserId($userId)
        );
        $this->assertSame(
            $userId,
            $this->shortStoryEntity->getUserId()
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
    }
}
