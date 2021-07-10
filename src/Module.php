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
                    ShortStoryHelper\RootRelativeUrl::class => function ($sm) {
                        return new ShortStoryHelper\RootRelativeUrl(
                            $sm->get(ShortStoryService\RootRelativeUrl::class)
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
                        $sm->get('short-story')
                    );
                },
                ShortStoryFactory\ShortStory::class => function ($sm) {
                    return new ShortStoryFactory\ShortStory(
                        $sm->get(ShortStoryTable\ShortStory::class)
                    );
                },
                ShortStoryService\RootRelativeUrl::class => function ($sm) {
                    return new ShortStoryService\RootRelativeUrl(
                        $sm->get(StringService\UrlFriendly::class)
                    );
                },
                ShortStoryService\ShortStories::class => function ($sm) {
                    return new ShortStoryService\ShortStories(
                        $sm->get(ShortStoryFactory\ShortStory::class),
                        $sm->get(ShortStoryTable\ShortStory::class)
                    );
                },
                ShortStoryService\Delete::class => function ($sm) {
                    return new ShortStoryService\Delete(
                        $sm->get(ShortStoryTable\ShortStory\ShortStoryId::class)
                    );
                },
                ShortStoryService\Submit::class => function ($sm) {
                    return new ShortStoryService\Submit(
                        $sm->get(FlashService\Flash::class),
                        $sm->get(ShortStoryTable\ShortStory::class)
                    );
                },
                ShortStoryTable\ShortStory::class => function ($sm) {
                    return new ShortStoryTable\ShortStory(
                        $sm->get('short-story')
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
