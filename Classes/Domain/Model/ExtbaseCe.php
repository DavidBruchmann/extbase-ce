<?php

declare(strict_types=1);

namespace WDB\ExtbaseCe\Domain\Model;


/**
 * This file is part of the "Extbase Ce" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 
 */

/**
 * ExtbaseCe
 */
class ExtbaseCe extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * header
     *
     * @var string
     */
    protected $header = '';

    /**
     * subheader
     *
     * @var string
     */
    protected $subheader = '';

    /**
     * bodytext
     *
     * @var string
     */
    protected $bodytext = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * headerLink
     *
     * @var string
     */
    protected $headerLink = '';

    /**
     * layout
     *
     * @var int
     */
    protected $layout = 0;

    /**
     * Returns the header
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Sets the header
     *
     * @param string $header
     * @return void
     */
    public function setHeader(string $header)
    {
        $this->header = $header;
    }

    /**
     * Returns the subheader
     *
     * @return string
     */
    public function getSubheader()
    {
        return $this->subheader;
    }

    /**
     * Sets the subheader
     *
     * @param string $subheader
     * @return void
     */
    public function setSubheader(string $subheader)
    {
        $this->subheader = $subheader;
    }

    /**
     * Returns the bodytext
     *
     * @return string
     */
    public function getBodytext()
    {
        return $this->bodytext;
    }

    /**
     * Sets the bodytext
     *
     * @param string $bodytext
     * @return void
     */
    public function setBodytext(string $bodytext)
    {
        $this->bodytext = $bodytext;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the headerLink
     *
     * @return string
     */
    public function getHeaderLink()
    {
        return $this->headerLink;
    }

    /**
     * Sets the headerLink
     *
     * @param string $headerLink
     * @return void
     */
    public function setHeaderLink(string $headerLink)
    {
        $this->headerLink = $headerLink;
    }

    /**
     * Returns the layout
     *
     * @return int
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Sets the layout
     *
     * @param int $layout
     * @return void
     */
    public function setLayout(int $layout)
    {
        $this->layout = $layout;
    }
}
