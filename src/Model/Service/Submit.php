<?php
namespace LeoGalleguillos\ShortStory\Model\Service;

use Exception;
use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\ShortStory\Model\Table as ShortStoryTable;
use LeoGalleguillos\User\Model\Entity as UserEntity;

class Submit
{
    public function __construct(
        FlashService\Flash $flashService,
        ShortStoryTable\ShortStory $shortStoryTable
    )
    {
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
    }
}
