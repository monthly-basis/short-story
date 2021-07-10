<?php
namespace MonthlyBasis\ShortStory\Model\Service;

use DateTime;
use MonthlyBasis\ShortStory\Model\Entity as ShortStoryEntity;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;
use MonthlyBasis\User\Model\Entity as UserEntity;

class Delete
{
    public function __construct(
        ShortStoryTable\ShortStory\ShortStoryId $shortStoryIdTable
    ) {
        $this->shortStoryIdTable = $shortStoryIdTable;
    }

    public function delete(
        DateTime $dateTime,
        UserEntity\User $userEntity,
        string $reason,
        ShortStoryEntity\ShortStory $shortStoryEntity
    ): bool {
        $result = $this->shortStoryIdTable->updateSetDeletedDatetimeDeletedUserIdDeletedReasonWhereShortStoryId(
            $dateTime,
            $userEntity->getUserId(),
            $reason,
            $shortStoryEntity->getShortStoryId(),
        );

        return (bool) $result->getAffectedRows();
    }
}
