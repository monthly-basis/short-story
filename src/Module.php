<?php
namespace MonthlyBasis\ShortStory;

use MonthlyBasis\Flash\Model\Service as FlashService;
use MonthlyBasis\ShortStory\Model\Db as ShortStoryDb;
use MonthlyBasis\ShortStory\Model\Factory as ShortStoryFactory;
use MonthlyBasis\ShortStory\Model\Service as ShortStoryService;
use MonthlyBasis\ShortStory\Model\Table as ShortStoryTable;
use MonthlyBasis\ShortStory\View\Helper as ShortStoryHelper;
use MonthlyBasis\String\Model\Service as StringService;

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
                ShortStoryDb\Sql::class => function ($sm) {
                    return new ShortStoryDb\Sql(
                        $sm->get('main')
                    );
                },
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
                ShortStoryTable\ShortStory\ShortStoryId::class => function ($sm) {
                    return new ShortStoryTable\ShortStory\ShortStoryId(
                        $sm->get(ShortStoryDb\Sql::class),
                        $sm->get(ShortStoryTable\ShortStory::class),
                    );
                },
            ],
        ];
    }
}
