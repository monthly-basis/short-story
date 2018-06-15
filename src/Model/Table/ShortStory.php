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

    public function insert(
        string $title,
        string $body
    ) {
        $sql = '
            INSERT
              INTO `short_story` (
                   `title`, `body`
                   )
            VALUES (?, ?)
                 ;
        ';
        $parameters = [
            $title,
            $body,
        ];
        return $this->adapter
                    ->query($sql)
                    ->execute($parameters)
                    ->getGeneratedValue();
    }
}
