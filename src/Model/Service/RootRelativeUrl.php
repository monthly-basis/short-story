<?php
namespace LeoGalleguillos\ShortStory\Model\Service;

use LeoGalleguillos\ShortStory\Model\Entity as ShortStoryEntity;
use LeoGalleguillos\ShortStory\Model\Service as ShortStoryService;
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
