<?php
namespace LeoGalleguillos\ShortStory;

use MonthlyBasis\Flash\Model\Service as FlashService;
use LeoGalleguillos\ShortStory\Model\Factory as ShortStoryFactory;
use LeoGalleguillos\ShortStory\Model\Service as ShortStoryService;
use LeoGalleguillos\ShortStory\Model\Table as ShortStoryTable;
use LeoGalleguillos\ShortStory\View\Helper as ShortStoryHelper;
use LeoGalleguillos\String\Model\Service as StringService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'getRootRelativeUrl' => ShortStoryHelper\RootRelativeUrl::class,
                ],
                'factories' => [
                    ShortStoryHelper\RootRelativeUrl::class => function ($serviceManager) {
                        return new ShortStoryHelper\RootRelativeUrl(
                            $serviceManager->get(ShortStoryService\RootRelativeUrl::class)
                        );
                    },
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ShortStoryFactory\ShortStory::class => function ($serviceManager) {
                    return new ShortStoryFactory\ShortStory(
                        $serviceManager->get(ShortStoryTable\ShortStory::class)
                    );
                },
                ShortStoryService\RootRelativeUrl::class => function ($serviceManager) {
                    return new ShortStoryService\RootRelativeUrl(
                        $serviceManager->get(StringService\UrlFriendly::class)
                    );
                },
                ShortStoryService\ShortStories::class => function ($serviceManager) {
                    return new ShortStoryService\ShortStories(
                        $serviceManager->get(ShortStoryFactory\ShortStory::class),
                        $serviceManager->get(ShortStoryTable\ShortStory::class)
                    );
                },
                ShortStoryService\Submit::class => function ($serviceManager) {
                    return new ShortStoryService\Submit(
                        $serviceManager->get(FlashService\Flash::class),
                        $serviceManager->get(ShortStoryTable\ShortStory::class)
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
