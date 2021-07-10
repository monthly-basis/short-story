<?php
namespace MonthlyBasis\ShortStoryTest\Model\Service;

use DateTime;
use Laminas\Db\Adapter\Driver\Pdo\Result;
use MonthlyBasis\LaminasTest\TableTestCase;
use MonthlyBasis\ShortStory\Model\Entity as ShortStoryEntity;
use MonthlyBasis\ShortStory\Model\Service as ShortStoryService;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;
use MonthlyBasis\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class DeleteTest extends TestCase
{
    protected function setUp(): void
    {
        $this->shortStoryIdTableMock = $this->createMock(
            ShortStoryTable\ShortStory\ShortStoryId::class
        );
        $this->deleteService = new ShortStoryService\Delete(
            $this->shortStoryIdTableMock,
        );

        $this->resultMock = $this->createMock(
            Result::class
        );
    }

    public function test_delete_affectedRows0_returnFalse()
    {
        $dateTime         = new DateTime();
        $userEntity       = (new UserEntity\User())->setUserId(123);
        $reason           = 'this is the reason';
        $shortStoryEntity = (new ShortStoryEntity\ShortStory())->setShortStoryId(567);

        $this->resultMock
             ->expects($this->once())
             ->method('getAffectedRows')
             ->willReturn(0)
             ;
        $this->shortStoryIdTableMock
             ->expects($this->once())
             ->method('updateSetDeletedDatetimeDeletedUserIdDeletedReasonWhereShortStoryId')
             ->with($dateTime, 123, $reason, 567)
             ->willReturn($this->resultMock)
             ;

        $this->assertFalse(
            $this->deleteService->delete(
                $dateTime,
                $userEntity,
                $reason,
                $shortStoryEntity,
            )
        );
    }

    public function test_delete_affectedRows1_returnTrue()
    {
        $dateTime         = new DateTime();
        $userEntity       = (new UserEntity\User())->setUserId(123);
        $reason           = 'this is the reason';
        $shortStoryEntity = (new ShortStoryEntity\ShortStory())->setShortStoryId(567);

        $this->resultMock
             ->expects($this->once())
             ->method('getAffectedRows')
             ->willReturn(1)
             ;
        $this->shortStoryIdTableMock
             ->expects($this->once())
             ->method('updateSetDeletedDatetimeDeletedUserIdDeletedReasonWhereShortStoryId')
             ->with($dateTime, 123, $reason, 567)
             ->willReturn($this->resultMock)
             ;

        $this->assertTrue(
            $this->deleteService->delete(
                $dateTime,
                $userEntity,
                $reason,
                $shortStoryEntity,
            )
        );
    }
}
