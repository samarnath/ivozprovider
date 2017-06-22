<?php

namespace Core\Domain\Model\Terminal;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TerminalDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

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
     * @column direct_media_method
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
            'id' => $this->getId(),
            'name' => $this->getName(),
            'domain' => $this->getDomain(),
            'disallow' => $this->getDisallow(),
            'allowAudio' => $this->getAllowAudio(),
            'allowVideo' => $this->getAllowVideo(),
            'directMediaMethod' => $this->getDirectMediaMethod(),
            'password' => $this->getPassword(),
            'mac' => $this->getMac(),
            'lastProvisionDate' => $this->getLastProvisionDate(),
            'companyId' => $this->getCompanyId(),
            'terminalModelId' => $this->getTerminalModelId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setDomain(isset($data['domain']) ? $data['domain'] : null)
            ->setDisallow(isset($data['disallow']) ? $data['disallow'] : null)
            ->setAllowAudio(isset($data['allow_audio']) ? $data['allow_audio'] : null)
            ->setAllowVideo(isset($data['allow_video']) ? $data['allow_video'] : null)
            ->setDirectMediaMethod(isset($data['directMediaMethod']) ? $data['directMediaMethod'] : null)
            ->setPassword(isset($data['password']) ? $data['password'] : null)
            ->setMac(isset($data['mac']) ? $data['mac'] : null)
            ->setLastProvisionDate(isset($data['lastProvisionDate']) ? $data['lastProvisionDate'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setTerminalModelId(isset($data['TerminalModelId']) ? $data['TerminalModelId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
        $this->terminalModel = $transformer->transform('Core\\Domain\\Model\\TerminalModel\\TerminalModelInterface', $this->getTerminalModelId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

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
     * @return \Core\Domain\Model\Company\CompanyInterface
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
     * @return \Core\Domain\Model\TerminalModel\TerminalModelInterface
     */
    public function getTerminalModel()
    {
        return $this->TerminalModel;
    }
}

