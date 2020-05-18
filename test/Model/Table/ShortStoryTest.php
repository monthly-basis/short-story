<?php
namespace LeoGalleguillos\ShortStoryTest\Model\Table;

use ArrayObject;
use Exception;
use LeoGalleguillos\ShortStory\Model\Table as ShortStoryTable;
use LeoGalleguillos\ShortStoryTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class ShortStoryTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/short_story/';

    protected function setUp(): void
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);

        $this->shortStoryTable = new ShortStoryTable\ShortStory($this->adapter);

        $this->setForeignKeyChecks0();
        $this->dropTable();
        $this->createTable();
        $this->setForeignKeyChecks1();
    }

    protected function dropTable()
    {
        $sql = file_get_contents($this->sqlPath . 'drop.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    protected function createTable()
    {
        $sql = file_get_contents($this->sqlPath . 'create.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            ShortStoryTable\ShortStory::class,
            $this->shortStoryTable
        );
    }
}
