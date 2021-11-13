<?php
namespace MonthlyBasis\ShortStory\Model\Table;

use Exception;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\Driver\Pdo\Result;

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

    public function selectWhereDeletedDatetimeIsNull(): Result
    {
        $sql = '
            SELECT `short_story_id`
                 , `user_id`
                 , `title`
                 , `body`
              FROM `short_story`
             WHERE `deleted_datetime` IS NULL
             ORDER
                BY `short_story_id` DESC
             LIMIT 100
                 ;
        ';
        return $this->adapter->query($sql)->execute();
    }

    public function selectWhereShortStoryId(int $shortStoryId): array
    {
        $sql = '
            SELECT `short_story_id`
                 , `user_id`
                 , `title`
                 , `body`
                 , `created_datetime`
                 , `deleted_datetime`
                 , `deleted_user_id`
                 , `deleted_reason`
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
