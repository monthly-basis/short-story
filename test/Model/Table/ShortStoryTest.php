<?php
namespace MonthlyBasis\ShortStoryTest\Model\Table;

use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;
use MonthlyBasis\LaminasTest\TableTestCase;

class ShortStoryTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->setForeignKeyChecks0();
        $this->dropAndCreateTable('short_story');
        $this->setForeignKeyChecks1();

        $this->shortStoryTable = new ShortStoryTable\ShortStory($this->getAdapter());
    }

    public function test_insert()
    {
        $shortStoryId = $this->shortStoryTable->insert(
            12345,
            'title',
            'body',
        );
        $this->assertSame(
            '1',
            $shortStoryId,
        );
    }
}
