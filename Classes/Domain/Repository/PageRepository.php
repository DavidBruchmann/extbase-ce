<?php

namespace WDB\ExtbaseCe\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This file is part of the "Extbase Ce" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 
 */

/**
 * The repository for Pages
 */
class PageRepository
{

    public function getPageUidBySlug($slug, $trimmed=0)
    {
        $row = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('pages')
            ->select(
                ['uid'], // fields to select
                'pages', // from
                [ 'slug' => (string)$slug ] // where
            )
            ->fetch();
        if (!$row && $trimmed===0) {
            return $this->getPageUidBySlug(rtrim($slug, '/'), $trimmed=1);
        }
        return $row;
    }
}
