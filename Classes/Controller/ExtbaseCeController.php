<?php

declare(strict_types=1);

namespace WDB\ExtbaseCe\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use WDB\ExtbaseCe\Domain\Model\ExtbaseCe;
use WDB\ExtbaseCe\Domain\Repository\ExtbaseCeRepository;
use WDB\ExtbaseCe\Domain\Repository\PageRepository;


/**
 * This file is part of the "Extbase Ce" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023
 */

/**
 * ExtbaseCeController
 */
class ExtbaseCeController extends ActionController
{

    /**
     * extbaseCeRepository
     *
     * @var ExtbaseCeRepository
     */
    protected $extbaseCeRepository = null;

    /**
     * pageRepository
     *
     * @var PageRepository
     */
    protected $pageRepository = null;

    /**
     * @param ExtbaseCeRepository $extbaseCeRepository
     */
    public function injectExtbaseCeRepository(ExtbaseCeRepository $extbaseCeRepository)
    {
        $this->extbaseCeRepository = $extbaseCeRepository;
    }

    /**
     * @param PageRepository $pageRepository
     */
    public function injectPageRepository(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * action render
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function renderAction(): \Psr\Http\Message\ResponseInterface
    {
        $cObj = $this->request->getAttributes()['currentContentObject'];
        $data = $cObj->data;

        // is mapping only without query
        $extbaseCe = $this->extbaseCeRepository->mapRow($data);

        $this->resolveSlug($extbaseCe, $extbaseCe->getHeaderLink(), 'headerLink');

        $this->view->assign('extbaseCe', $extbaseCe);
        return $this->htmlResponse();
    }

    /**
     * This method makes it possible to enter slugs in a link-field
     * 
     * Slugs as links can't be managed by TYPO3 though, they are static values
     *   which have to be updated manually if they are changed on a page.
     *   How far links are managed by TYPO3 is not relevant here.
     */
    protected function resolveSlug(AbstractEntity $modelObject, string $link, string $property): void
    {         
        if (strpos($link, '/') === 0) {
            $pageUid = $this->pageRepository->getPageUidBySlug($link);
            $method = 'set' . ucfirst($property);
            if (!empty($pageUid) && method_exists($modelObject, $method)) {
                $modelObject->$method('t3://page?uid=' . $pageUid);
            }
        }
    }
}
