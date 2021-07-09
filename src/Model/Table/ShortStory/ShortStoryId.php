<?php
namespace MonthlyBasis\ShortStory\Model\Table\ShortStory;

use DateTime;
use Laminas\Db\Adapter\Driver\Pdo\Result;
use MonthlyBasis\ShortStory\Model\Db as ShortStoryDb;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;

class ShortStoryId
{
    protected ShortStoryDb\Sql $sql;

    public function __construct(
        ShortStoryDb\Sql $sql,
        ShortStoryTable\ShortStory $shortStoryTable
    ) {
        $this->sql             = $sql;
        $this->shortStoryTable = $shortStoryTable;
    }

    public function updateSetDeletedDatetimeDeletedUserIdDeletedReasonWhereShortStoryId(
        DateTime $deletedDateTime,
        int $deletedUserId,
        string $deletedReason,
        int $shortStoryId
    ): Result {
        $update = $this->sql
             ->update('short_story')
             ->set([
                'deleted_datetime' => $deletedDateTime->format('Y-m-d H-i-s'),
                'deleted_user_id'  => $deletedUserId,
                'deleted_reason'   => $deletedReason,
             ])
             ->where([
                'short_story_id' => $shortStoryId,
             ]);
        return $this->sql->prepareStatementForSqlObject($update)->execute();
    }
}
