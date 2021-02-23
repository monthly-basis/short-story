<?php
namespace MonthlyBasis\ShortStory\View\Helper;

use MonthlyBasis\ShortStory\Model\Entity as ShortStoryEntity;
use MonthlyBasis\ShortStory\Model\Service as ShortStoryService;
use MonthlyBasis\ShortStory\View\Helper as ShortStoryHelper;
use Laminas\View\Helper\AbstractHelper;

class RootRelativeUrl extends AbstractHelper
{
    public function __construct(
        ShortStoryService\RootRelativeUrl $rootRelativeUrlService
    ) {
        $this->rootRelativeUrlService = $rootRelativeUrlService;
    }

    /**
     * Get root relative URL.
     *
     * @param ShortStoryEntity\ShortStory $ShortStoryEntity
     * @return string
     */
    public function __invoke(
        ShortStoryEntity\ShortStory $ShortStoryEntity
    ) : string {
        return $this->rootRelativeUrlService->getRootRelativeUrl(
            $ShortStoryEntity
        );
    }
}
