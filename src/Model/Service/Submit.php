<?php
namespace MonthlyBasis\ShortStory\Model\Service;

use Exception;
use MonthlyBasis\Flash\Model\Service as FlashService;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;
use LeoGalleguillos\User\Model\Entity as UserEntity;

class Submit
{
    public function __construct(
        FlashService\Flash $flashService,
        ShortStoryTable\ShortStory $shortStoryTable
    ) {
        $this->flashService    = $flashService;
        $this->shortStoryTable = $shortStoryTable;
    }

    public function submit(
        UserEntity\User $userEntity
    ) {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors[] = 'Invalid title.';
        }
        if (empty($_POST['body'])) {
            $errors[] = 'Invalid short story.';
        }
        if ($errors) {
            $this->flashService->set('errors', $errors);
            throw new Exception('Invalid form input.');
        }

        $shortStoryId = $this->shortStoryTable->insert(
            $userEntity->getUserId(),
            $_POST['title'],
            $_POST['body']
        );

        return $shortStoryId;
    }
}
