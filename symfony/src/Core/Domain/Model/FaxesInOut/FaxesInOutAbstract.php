<?php

namespace Core\Domain\Model\FaxesInOut;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * FaxesInOutAbstract
 */
abstract class FaxesInOutAbstract
{
    /**
     * @comment ora de recepcion del fa
     * @var \DateTime
     */
    protected $calldate = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    protected $src;

    /**
     * @var string
     */
    protected $dst;

    /**
     * @comment enum:In|Out
     * @var string
     */
    protected $type = 'Out';

    /**
     * @var string
     */
    protected $pages;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var \Core\Domain\Model\FaxesInOut\File
     */
    protected $file;

    /**
     * @var \Core\Domain\Model\Fax\FaxInterface
     */
    protected $fax;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set calldate
     *
     * @param \DateTime $calldate
     *
     * @return self
     */
    protected function setCalldate($calldate)
    {
        Assertion::notNull($calldate);

        $this->calldate = $calldate;

        return $this;
    }

    /**
     * Get calldate
     *
     * @return \DateTime
     */
    public function getCalldate()
    {
        return $this->calldate;
    }

    /**
     * Set src
     *
     * @param string $src
     *
     * @return self
     */
    protected function setSrc($src = null)
    {
        if (!is_null($src)) {
            Assertion::maxLength($src, 128);
        }

        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set dst
     *
     * @param string $dst
     *
     * @return self
     */
    protected function setDst($dst = null)
    {
        if (!is_null($dst)) {
            Assertion::maxLength($dst, 128);
        }

        $this->dst = $dst;

        return $this;
    }

    /**
     * Get dst
     *
     * @return string
     */
    public function getDst()
    {
        return $this->dst;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    protected function setType($type = null)
    {
        if (!is_null($type)) {
            Assertion::maxLength($type, 20);
        Assertion::choice($type, array (
          0 => '    In',
          1 => '    Out',
        ));
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set pages
     *
     * @param string $pages
     *
     * @return self
     */
    protected function setPages($pages = null)
    {
        if (!is_null($pages)) {
            Assertion::maxLength($pages, 64);
        }

        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return string
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return self
     */
    protected function setStatus($status = null)
    {
        if (!is_null($status)) {
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set fax
     *
     * @param \Core\Domain\Model\Fax\FaxInterface $fax
     *
     * @return self
     */
    protected function setFax(\Core\Domain\Model\Fax\FaxInterface $fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return \Core\Domain\Model\Fax\FaxInterface
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set file
     *
     * @param File $file
     *
     * @return self
     */
    protected function setFile(File $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    // @codeCoverageIgnoreEnd
}

