<?php
namespace MonthlyBasis\ShortStory\Model\Service;

use MonthlyBasis\ShortStory\Model\Entity as ShortStoryEntity;
use MonthlyBasis\ShortStory\Model\Service as ShortStoryService;
use MonthlyBasis\String\Model\Service as StringService;

class RootRelativeUrl
{
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    /**
     * Get root relative URL.
     *
     * @param ShortStoryEntity\ShortStory $shortStoryEntity
     * @return string
     */
    public function getRootRelativeUrl(
        ShortStoryEntity\ShortStory $shortStoryEntity
    ) : string {
        return '/short-stories/'
             . $shortStoryEntity->getShortStoryId()
             . '/'
             . $this->urlFriendlyService->getUrlFriendly(
                   $shortStoryEntity->getTitle()
               );
    }
}
