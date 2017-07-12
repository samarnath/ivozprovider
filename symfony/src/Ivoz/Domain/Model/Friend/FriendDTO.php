<?php

namespace Ivoz\Domain\Model\Friend;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class FriendDTO implements DataTransferObjectInterface
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
    private $description = '';

    /**
     * @var string
     */
    private $transport;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var integer
     */
    private $port;

    /**
     * @var string
     */
    private $authNeeded = 'yes';

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $areaCode;

    /**
     * @var integer
     */
    private $priority = '1';

    /**
     * @var string
     */
    private $disallow = 'all';

    /**
     * @var string
     */
    private $allow = 'alaw';

    /**
     * @var string
     */
    private $directMediaMethod = 'update';

    /**
     * @var string
     */
    private $calleridUpdateHeader = 'pai';

    /**
     * @var string
     */
    private $updateCallerid = 'yes';

    /**
     * @var string
     */
    private $fromDomain;

    /**
     * @var string
     */
    private $directConnectivity = 'yes';

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
    private $countryId;

    /**
     * @var mixed
     */
    private $callACLId;

    /**
     * @var mixed
     */
    private $outgoingDDIId;

    /**
     * @var mixed
     */
    private $languageId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $country;

    /**
     * @var mixed
     */
    private $callACL;

    /**
     * @var mixed
     */
    private $outgoingDDI;

    /**
     * @var mixed
     */
    private $language;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'name' => $this->getName(),
            'domain' => $this->getDomain(),
            'description' => $this->getDescription(),
            'transport' => $this->getTransport(),
            'ip' => $this->getIp(),
            'port' => $this->getPort(),
            'authNeeded' => $this->getAuthNeeded(),
            'password' => $this->getPassword(),
            'areaCode' => $this->getAreaCode(),
            'priority' => $this->getPriority(),
            'disallow' => $this->getDisallow(),
            'allow' => $this->getAllow(),
            'directMediaMethod' => $this->getDirectMediaMethod(),
            'calleridUpdateHeader' => $this->getCalleridUpdateHeader(),
            'updateCallerid' => $this->getUpdateCallerid(),
            'fromDomain' => $this->getFromDomain(),
            'directConnectivity' => $this->getDirectConnectivity(),
            'id' => $this->getId(),
            'companyId' => $this->getCompanyId(),
            'countryId' => $this->getCountryId(),
            'callACLId' => $this->getCallACLId(),
            'outgoingDDIId' => $this->getOutgoingDDIId(),
            'languageId' => $this->getLanguageId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->country = $transformer->transform('Ivoz\\Domain\\Model\\Country\\Country', $this->getCountryId());
        $this->callACL = $transformer->transform('Ivoz\\Domain\\Model\\CallACL\\CallACL', $this->getCallACLId());
        $this->outgoingDDI = $transformer->transform('Ivoz\\Domain\\Model\\DDI\\DDI', $this->getOutgoingDDIId());
        $this->language = $transformer->transform('Ivoz\\Domain\\Model\\Language\\Language', $this->getLanguageId());
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
     * @return FriendDTO
     */
    public function setName($name)
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
     * @return FriendDTO
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
     * @param string $description
     *
     * @return FriendDTO
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $transport
     *
     * @return FriendDTO
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param string $ip
     *
     * @return FriendDTO
     */
    public function setIp($ip = null)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param integer $port
     *
     * @return FriendDTO
     */
    public function setPort($port = null)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $authNeeded
     *
     * @return FriendDTO
     */
    public function setAuthNeeded($authNeeded)
    {
        $this->authNeeded = $authNeeded;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthNeeded()
    {
        return $this->authNeeded;
    }

    /**
     * @param string $password
     *
     * @return FriendDTO
     */
    public function setPassword($password = null)
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
     * @param string $areaCode
     *
     * @return FriendDTO
     */
    public function setAreaCode($areaCode = null)
    {
        $this->areaCode = $areaCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * @param integer $priority
     *
     * @return FriendDTO
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $disallow
     *
     * @return FriendDTO
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
     * @param string $allow
     *
     * @return FriendDTO
     */
    public function setAllow($allow)
    {
        $this->allow = $allow;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * @param string $directMediaMethod
     *
     * @return FriendDTO
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
     * @param string $calleridUpdateHeader
     *
     * @return FriendDTO
     */
    public function setCalleridUpdateHeader($calleridUpdateHeader)
    {
        $this->calleridUpdateHeader = $calleridUpdateHeader;

        return $this;
    }

    /**
     * @return string
     */
    public function getCalleridUpdateHeader()
    {
        return $this->calleridUpdateHeader;
    }

    /**
     * @param string $updateCallerid
     *
     * @return FriendDTO
     */
    public function setUpdateCallerid($updateCallerid)
    {
        $this->updateCallerid = $updateCallerid;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpdateCallerid()
    {
        return $this->updateCallerid;
    }

    /**
     * @param string $fromDomain
     *
     * @return FriendDTO
     */
    public function setFromDomain($fromDomain = null)
    {
        $this->fromDomain = $fromDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromDomain()
    {
        return $this->fromDomain;
    }

    /**
     * @param string $directConnectivity
     *
     * @return FriendDTO
     */
    public function setDirectConnectivity($directConnectivity)
    {
        $this->directConnectivity = $directConnectivity;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectConnectivity()
    {
        return $this->directConnectivity;
    }

    /**
     * @param integer $id
     *
     * @return FriendDTO
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
     * @return FriendDTO
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
     * @param integer $countryId
     *
     * @return FriendDTO
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @return \Ivoz\Domain\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param integer $callACLId
     *
     * @return FriendDTO
     */
    public function setCallACLId($callACLId)
    {
        $this->callACLId = $callACLId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCallACLId()
    {
        return $this->callACLId;
    }

    /**
     * @return \Ivoz\Domain\Model\CallACL\CallACL
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * @param integer $outgoingDDIId
     *
     * @return FriendDTO
     */
    public function setOutgoingDDIId($outgoingDDIId)
    {
        $this->outgoingDDIId = $outgoingDDIId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingDDIId()
    {
        return $this->outgoingDDIId;
    }

    /**
     * @return \Ivoz\Domain\Model\DDI\DDI
     */
    public function getOutgoingDDI()
    {
        return $this->outgoingDDI;
    }

    /**
     * @param integer $languageId
     *
     * @return FriendDTO
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @return \Ivoz\Domain\Model\Language\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }
}

