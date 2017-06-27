<?php

namespace Ast\Domain\Model\Musiconhold;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * MusiconholdAbstract
 */
abstract class MusiconholdAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $mode;

    /**
     * @var string
     */
    protected $directory;

    /**
     * @var string
     */
    protected $application;

    /**
     * @var string
     */
    protected $digit;

    /**
     * @var string
     */
    protected $sort;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var \DateTime
     */
    protected $stamp;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 80);

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mode
     *
     * @param string $mode
     *
     * @return self
     */
    protected function setMode($mode = null)
    {
        if (!is_null($mode)) {
        }

        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set directory
     *
     * @param string $directory
     *
     * @return self
     */
    protected function setDirectory($directory = null)
    {
        if (!is_null($directory)) {
            Assertion::maxLength($directory, 255);
        }

        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Set application
     *
     * @param string $application
     *
     * @return self
     */
    protected function setApplication($application = null)
    {
        if (!is_null($application)) {
            Assertion::maxLength($application, 255);
        }

        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set digit
     *
     * @param string $digit
     *
     * @return self
     */
    protected function setDigit($digit = null)
    {
        if (!is_null($digit)) {
            Assertion::maxLength($digit, 1);
        }

        $this->digit = $digit;

        return $this;
    }

    /**
     * Get digit
     *
     * @return string
     */
    public function getDigit()
    {
        return $this->digit;
    }

    /**
     * Set sort
     *
     * @param string $sort
     *
     * @return self
     */
    protected function setSort($sort = null)
    {
        if (!is_null($sort)) {
            Assertion::maxLength($sort, 10);
        }

        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return self
     */
    protected function setFormat($format = null)
    {
        if (!is_null($format)) {
            Assertion::maxLength($format, 10);
        }

        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set stamp
     *
     * @param \DateTime $stamp
     *
     * @return self
     */
    protected function setStamp($stamp = null)
    {
        if (!is_null($stamp)) {
        }

        $this->stamp = $stamp;

        return $this;
    }

    /**
     * Get stamp
     *
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }



    // @codeCoverageIgnoreEnd
}

