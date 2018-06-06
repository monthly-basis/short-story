<?php
namespace LeoGalleguillos\ShortStory;

use LeoGalleguillos\ShortStory\Model\Factory as ShortStoryFactory;
use LeoGalleguillos\ShortStory\Model\Service as ShortStoryService;
use LeoGalleguillos\ShortStory\Model\Table as ShortStoryTable;
use LeoGalleguillos\ShortStory\View\Helper as ShortStoryHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ShortStoryService\Submit::class => function ($serviceManager) {
                    return new ShortStoryService\Submit(
                    );
                },
                ShortStoryTable\ShortStory::class => function ($serviceManager) {
                    return new ShortStoryTable\ShortStory(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
