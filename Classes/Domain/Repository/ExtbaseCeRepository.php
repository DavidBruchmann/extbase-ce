<?php

declare(strict_types=1);

namespace WDB\ExtbaseCe\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use WDB\ExtbaseCe\Domain\Model\ExtbaseCe;

/**
 * This file is part of the "Extbase Ce" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 
 */

/**
 * The repository for ExtbaseCe
 */
class ExtbaseCeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];
    
    public function injectDataMapper(DataMapper $DataMapper): void
    {
        $this->DataMapper = $DataMapper;
    }
    
    /**
     * This maps a single row without query
     */
    public function mapRow(array $row): ExtbaseCe
    {
        $object = $this->DataMapper->map(ExtbaseCe::class, [$row]);
        return $object[0];
    }
}
