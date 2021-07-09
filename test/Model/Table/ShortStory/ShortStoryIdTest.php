<?php
namespace MonthlyBasis\ShortStoryTest\Model\Table\ShortStory;

use DateTime;
use MonthlyBasis\LaminasTest\TableTestCase;
use MonthlyBasis\ShortStory\Model\Db as ShortStoryDb;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;
use PHPUnit\Framework\TestCase;

class ShortStoryIdTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->dropAndCreateTable('short_story');

        $this->sql = new ShortStoryDb\Sql(
            $this->getAdapter()
        );
        $this->shortStoryTable = new ShortStoryTable\ShortStory(
            $this->getAdapter()
        );
        $this->shortStoryIdTable = new ShortStoryTable\ShortStory\ShortStoryId(
            $this->sql,
            $this->shortStoryTable,
        );
    }

    public function test_updateSetDeletedDatetimeDeletedUserIdDeletedReasonWhereShortStoryId()
    {
        $result = $this->shortStoryIdTable->updateSetDeletedDatetimeDeletedUserIdDeletedReasonWhereShortStoryId(
            (new DateTime()),
            12345,
            'reason',
            1,
        );
        $this->assertSame(
            0,
            $result->getAffectedRows(),
        );

        $this->shortStoryTable->insert(
            12345,
            'title',
            'body',
        );

        $result = $this->shortStoryIdTable->updateSetDeletedDatetimeDeletedUserIdDeletedReasonWhereShortStoryId(
            (new DateTime('2020-07-09 16:45:12')),
            12345,
            'my reason',
            1,
        );
        $array = $this->shortStoryTable->selectWhereShortStoryId(1);
        $this->assertSame(
            [
                'short_story_id'   => '1',
                'title'            => 'title',
                'body'             => 'body',
                'deleted_datetime' => '2020-07-09 16:45:12',
                'deleted_user_id'  => '12345',
                'deleted_reason'   => 'my reason',
            ],
            [
                'short_story_id'   => $array['short_story_id'],
                'title'            => $array['title'],
                'body'             => $array['body'],
                'deleted_datetime' => $array['deleted_datetime'],
                'deleted_user_id'  => $array['deleted_user_id'],
                'deleted_reason'   => $array['deleted_reason'],
            ],
        );
    }
}
