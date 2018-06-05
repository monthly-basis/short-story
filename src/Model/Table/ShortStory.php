<?php
namespace LeoGalleguillos\ShortStory\Model\Table;

use Exception;
use Generator;
use Zend\Db\Adapter\Adapter;

class ShortStory
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }
}
