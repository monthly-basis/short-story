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

    /**
     * Select.
     *
     * @yield array
     * @return Generator
     */
    public function select(): Generator
    {
        $sql = '
            SELECT `short_story_id`
                 , `user_id`
                 , `title`
                 , `body`
              FROM `short_story`
             ORDER
                BY `short_story_id` DESC
             LIMIT 100
                 ;
        ';
        foreach ($this->adapter->query($sql)->execute() as $row) {
            yield($row);
        }
    }

    public function selectWhereShortStoryId(int $shortStoryId): array
    {
        $sql = '
            SELECT `short_story_id`
                 , `user_id`
                 , `title`
                 , `body`
              FROM `short_story`
             WHERE `short_story_id` = ?
                 ;
        ';
        $parameters = [
            $shortStoryId,
        ];
        return $this->adapter->query($sql)->execute($parameters)->current();
    }
}
