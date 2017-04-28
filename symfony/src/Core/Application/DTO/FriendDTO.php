<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class FriendDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var string
     */
    public $transport;

    /**
     * @var string
     */
    public $ip;

    /**
     * @var integer
     */
    public $port;

    /**
     * @column auth_needed
     * @var string
     */
    public $authNeeded = 'yes';

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $areaCode;

    /**
     * @var integer
     */
    public $priority = '1';

    /**
     * @var string
     */
    public $disallow = 'all';

    /**
     * @var string
     */
    public $allow = 'alaw';

    /**
     * @column direct_media_method
     * @var string
     */
    public $directMediaMethod = 'update';

    /**
     * @column callerid_update_header
     * @var string
     */
    public $calleridUpdateHeader = 'pai';

    /**
     * @column update_callerid
     * @var string
     */
    public $updateCallerid = 'yes';

    /**
     * @column from_domain
     * @var string
     */
    public $fromDomain;

    /**
     * @var string
     */
    public $directConnectivity = 'yes';

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $countryId;

    /**
     * @var mixed
     */
    public $callACLId;

    /**
     * @var mixed
     */
    public $outgoingDDIId;

    /**
     * @var mixed
     */
    public $languageId;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @var mixed
     */
    public $country;

    /**
     * @var mixed
     */
    public $callACL;

    /**
     * @var mixed
     */
    public $outgoingDDI;

    /**
     * @var mixed
     */
    public $language;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
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
            'companyId' => $this->getCompanyId(),
            'countryId' => $this->getCountryId(),
            'callACLId' => $this->getCallACLId(),
            'outgoingDDIId' => $this->getOutgoingDDIId(),
            'languageId' => $this->getLanguageId()
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
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setTransport(isset($data['transport']) ? $data['transport'] : null)
            ->setIp(isset($data['ip']) ? $data['ip'] : null)
            ->setPort(isset($data['port']) ? $data['port'] : null)
            ->setAuthNeeded(isset($data['authNeeded']) ? $data['authNeeded'] : null)
            ->setPassword(isset($data['password']) ? $data['password'] : null)
            ->setAreaCode(isset($data['areaCode']) ? $data['areaCode'] : null)
            ->setPriority(isset($data['priority']) ? $data['priority'] : null)
            ->setDisallow(isset($data['disallow']) ? $data['disallow'] : null)
            ->setAllow(isset($data['allow']) ? $data['allow'] : null)
            ->setDirectMediaMethod(isset($data['directMediaMethod']) ? $data['directMediaMethod'] : null)
            ->setCalleridUpdateHeader(isset($data['calleridUpdateHeader']) ? $data['calleridUpdateHeader'] : null)
            ->setUpdateCallerid(isset($data['updateCallerid']) ? $data['updateCallerid'] : null)
            ->setFromDomain(isset($data['fromDomain']) ? $data['fromDomain'] : null)
            ->setDirectConnectivity(isset($data['directConnectivity']) ? $data['directConnectivity'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setCountryId(isset($data['countryId']) ? $data['countryId'] : null)
            ->setCallACLId(isset($data['callACLId']) ? $data['callACLId'] : null)
            ->setOutgoingDDIId(isset($data['outgoingDDIId']) ? $data['outgoingDDIId'] : null)
            ->setLanguageId(isset($data['languageId']) ? $data['languageId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
        $this->country = $transformer->transform('Core\\Model\\Country\\Country', $this->getCountryId());
        $this->callACL = $transformer->transform('Core\\Model\\CallACL\\CallACL', $this->getCallACLId());
        $this->outgoingDDI = $transformer->transform('Core\\Model\\DDI\\DDI', $this->getOutgoingDDIId());
        $this->language = $transformer->transform('Core\\Model\\Language\\Language', $this->getLanguageId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

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
     * @return \Core\Model\Company\Company
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
     * @return \Core\Model\Country\Country
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
     * @return \Core\Model\CallACL\CallACL
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
     * @return \Core\Model\DDI\DDI
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
     * @return \Core\Model\Language\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }
}

