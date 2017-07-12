<?php

namespace Ivoz\Domain\Model\Terminal;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TerminalDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $disallow = 'all';

    /**
     * @var string
     */
    private $allow_audio = 'alaw';

    /**
     * @var string
     */
    private $allow_video;

    /**
     * @var string
     */
    private $directMediaMethod = 'update';

    /**
     * @var string
     */
    private $password = '';

    /**
     * @var string
     */
    private $mac;

    /**
     * @var \DateTime
     */
    private $lastProvisionDate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $TerminalModelId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $TerminalModel;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'name' => $this->getName(),
            'domain' => $this->getDomain(),
            'disallow' => $this->getDisallow(),
            'allowAudio' => $this->getAllowAudio(),
            'allowVideo' => $this->getAllowVideo(),
            'directMediaMethod' => $this->getDirectMediaMethod(),
            'password' => $this->getPassword(),
            'mac' => $this->getMac(),
            'lastProvisionDate' => $this->getLastProvisionDate(),
            'id' => $this->getId(),
            'companyId' => $this->getCompanyId(),
            'terminalModelId' => $this->getTerminalModelId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->terminalModel = $transformer->transform('Ivoz\\Domain\\Model\\TerminalModel\\TerminalModel', $this->getTerminalModelId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $name
     *
     * @return TerminalDTO
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $domain
     *
     * @return TerminalDTO
     */
    public function setDomain($domain = null)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $disallow
     *
     * @return TerminalDTO
     */
    public function setDisallow($disallow)
    {
        $this->disallow = $disallow;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisallow()
    {
        return $this->disallow;
    }

    /**
     * @param string $allowAudio
     *
     * @return TerminalDTO
     */
    public function setAllowAudio($allowAudio)
    {
        $this->allow_audio = $allowAudio;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllowAudio()
    {
        return $this->allow_audio;
    }

    /**
     * @param string $allowVideo
     *
     * @return TerminalDTO
     */
    public function setAllowVideo($allowVideo = null)
    {
        $this->allow_video = $allowVideo;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllowVideo()
    {
        return $this->allow_video;
    }

    /**
     * @param string $directMediaMethod
     *
     * @return TerminalDTO
     */
    public function setDirectMediaMethod($directMediaMethod)
    {
        $this->directMediaMethod = $directMediaMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectMediaMethod()
    {
        return $this->directMediaMethod;
    }

    /**
     * @param string $password
     *
     * @return TerminalDTO
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $mac
     *
     * @return TerminalDTO
     */
    public function setMac($mac = null)
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * @return string
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * @param \DateTime $lastProvisionDate
     *
     * @return TerminalDTO
     */
    public function setLastProvisionDate($lastProvisionDate = null)
    {
        $this->lastProvisionDate = $lastProvisionDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastProvisionDate()
    {
        return $this->lastProvisionDate;
    }

    /**
     * @param integer $id
     *
     * @return TerminalDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $companyId
     *
     * @return TerminalDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Ivoz\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $terminalModelId
     *
     * @return TerminalDTO
     */
    public function setTerminalModelId($terminalModelId)
    {
        $this->TerminalModelId = $terminalModelId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTerminalModelId()
    {
        return $this->TerminalModelId;
    }

    /**
     * @return \Ivoz\Domain\Model\TerminalModel\TerminalModel
     */
    public function getTerminalModel()
    {
        return $this->TerminalModel;
    }
}

