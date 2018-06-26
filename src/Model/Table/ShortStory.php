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
        int $userId,
        string $title,
        string $body
    ) {
        $sql = '
            INSERT
              INTO `short_story` (
                   `user_id`, `title`, `body`
                   )
            VALUES (?, ?, ?)
                 ;
        ';
        $parameters = [
            $userId,
            $title,
            $body,
        ];
        return $this->adapter
                    ->query($sql)
                    ->execute($parameters)
                    ->getGeneratedValue();
    }
}
