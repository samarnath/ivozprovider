<?php

namespace Core\Model\Friend;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Friend
 */
class Friend implements EntityInterface, FriendInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @comment enum:udp|tcp|tls
     * @var string
     */
    protected $transport;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @var integer
     */
    protected $port;

    /**
     * @column auth_needed
     * @var string
     */
    protected $authNeeded = 'yes';

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $areaCode;

    /**
     * @var integer
     */
    protected $priority = '1';

    /**
     * @var string
     */
    protected $disallow = 'all';

    /**
     * @var string
     */
    protected $allow = 'alaw';

    /**
     * @column direct_media_method
     * @comment enum:invite|update
     * @var string
     */
    protected $directMediaMethod = 'update';

    /**
     * @column callerid_update_header
     * @comment enum:pai|rpid
     * @var string
     */
    protected $calleridUpdateHeader = 'pai';

    /**
     * @column update_callerid
     * @comment enum:yes|no
     * @var string
     */
    protected $updateCallerid = 'yes';

    /**
     * @column from_domain
     * @var string
     */
    protected $fromDomain;

    /**
     * @comment enum:yes|no
     * @var string
     */
    protected $directConnectivity = 'yes';

    /**
     * @var \Core\Model\Company\Company
     */
    protected $company;

    /**
     * @var \Core\Model\Country\Country
     */
    protected $country;

    /**
     * @var \Core\Model\CallACL\CallACL
     */
    protected $callACL;

    /**
     * @var \Core\Model\DDI\DDI
     */
    protected $outgoingDDI;

    /**
     * @var \Core\Model\Language\Language
     */
    protected $language;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $name,
        $description,
        $transport,
        $authNeeded,
        $priority,
        $disallow,
        $allow,
        $directMediaMethod,
        $calleridUpdateHeader,
        $updateCallerid,
        $directConnectivity
    ) {
        $this->setName($name);
        $this->setDescription($description);
        $this->setTransport($transport);
        $this->setAuthNeeded($authNeeded);
        $this->setPriority($priority);
        $this->setDisallow($disallow);
        $this->setAllow($allow);
        $this->setDirectMediaMethod($directMediaMethod);
        $this->setCalleridUpdateHeader($calleridUpdateHeader);
        $this->setUpdateCallerid($updateCallerid);
        $this->setDirectConnectivity($directConnectivity);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return FriendDTO
     */
    public static function createDTO()
    {
        return new FriendDTO();
    }

    /**
     * Factory method
     * @param FriendDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FriendDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getDescription(),
            $dto->getTransport(),
            $dto->getAuthNeeded(),
            $dto->getPriority(),
            $dto->getDisallow(),
            $dto->getAllow(),
            $dto->getDirectMediaMethod(),
            $dto->getCalleridUpdateHeader(),
            $dto->getUpdateCallerid(),
            $dto->getDirectConnectivity()
        );

        return $self
            ->setDomain($dto->getDomain())
            ->setIp($dto->getIp())
            ->setPort($dto->getPort())
            ->setPassword($dto->getPassword())
            ->setAreaCode($dto->getAreaCode())
            ->setFromDomain($dto->getFromDomain())
            ->setCompany($dto->getCompany())
            ->setCountry($dto->getCountry())
            ->setCallACL($dto->getCallACL())
            ->setOutgoingDDI($dto->getOutgoingDDI())
            ->setLanguage($dto->getLanguage());
    }

    /**
     * @param FriendDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FriendDTO::class);

        $this
            ->setName($dto->getName())
            ->setDomain($dto->getDomain())
            ->setDescription($dto->getDescription())
            ->setTransport($dto->getTransport())
            ->setIp($dto->getIp())
            ->setPort($dto->getPort())
            ->setAuthNeeded($dto->getAuthNeeded())
            ->setPassword($dto->getPassword())
            ->setAreaCode($dto->getAreaCode())
            ->setPriority($dto->getPriority())
            ->setDisallow($dto->getDisallow())
            ->setAllow($dto->getAllow())
            ->setDirectMediaMethod($dto->getDirectMediaMethod())
            ->setCalleridUpdateHeader($dto->getCalleridUpdateHeader())
            ->setUpdateCallerid($dto->getUpdateCallerid())
            ->setFromDomain($dto->getFromDomain())
            ->setDirectConnectivity($dto->getDirectConnectivity())
            ->setCompany($dto->getCompany())
            ->setCountry($dto->getCountry())
            ->setCallACL($dto->getCallACL())
            ->setOutgoingDDI($dto->getOutgoingDDI())
            ->setLanguage($dto->getLanguage());


        return $this;
    }

    /**
     * @return FriendDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setDomain($this->getDomain())
            ->setDescription($this->getDescription())
            ->setTransport($this->getTransport())
            ->setIp($this->getIp())
            ->setPort($this->getPort())
            ->setAuthNeeded($this->getAuthNeeded())
            ->setPassword($this->getPassword())
            ->setAreaCode($this->getAreaCode())
            ->setPriority($this->getPriority())
            ->setDisallow($this->getDisallow())
            ->setAllow($this->getAllow())
            ->setDirectMediaMethod($this->getDirectMediaMethod())
            ->setCalleridUpdateHeader($this->getCalleridUpdateHeader())
            ->setUpdateCallerid($this->getUpdateCallerid())
            ->setFromDomain($this->getFromDomain())
            ->setDirectConnectivity($this->getDirectConnectivity())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setCountryId($this->getCountry() ? $this->getCountry()->getId() : null)
            ->setCallACLId($this->getCallACL() ? $this->getCallACL()->getId() : null)
            ->setOutgoingDDIId($this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null)
            ->setLanguageId($this->getLanguage() ? $this->getLanguage()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
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
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null,
            'callACLId' => $this->getCallACL() ? $this->getCallACL()->getId() : null,
            'outgoingDDIId' => $this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null,
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Friend
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 65);

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
     * Set domain
     *
     * @param string $domain
     *
     * @return Friend
     */
    protected function setDomain($domain = null)
    {
        if (!is_null($domain)) {
            Assertion::maxLength($domain, 190);
        }

        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Friend
     */
    protected function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::maxLength($description, 500);

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set transport
     *
     * @param string $transport
     *
     * @return Friend
     */
    protected function setTransport($transport)
    {
        Assertion::notNull($transport);
        Assertion::maxLength($transport, 25);
        Assertion::choice($transport, array (
          0 => 'udp',
          1 => 'tcp',
          2 => 'tls',
        ));

        $this->transport = $transport;

        return $this;
    }

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Friend
     */
    protected function setIp($ip = null)
    {
        if (!is_null($ip)) {
            Assertion::maxLength($ip, 50);
        }

        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set port
     *
     * @param integer $port
     *
     * @return Friend
     */
    protected function setPort($port = null)
    {
        if (!is_null($port)) {
            if (!is_null($port)) {
                Assertion::integerish($port);
                Assertion::greaterOrEqualThan($port, 0);
            }
        }

        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set authNeeded
     *
     * @param string $authNeeded
     *
     * @return Friend
     */
    protected function setAuthNeeded($authNeeded)
    {
        Assertion::notNull($authNeeded);

        $this->authNeeded = $authNeeded;

        return $this;
    }

    /**
     * Get authNeeded
     *
     * @return string
     */
    public function getAuthNeeded()
    {
        return $this->authNeeded;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Friend
     */
    protected function setPassword($password = null)
    {
        if (!is_null($password)) {
            Assertion::maxLength($password, 64);
        }

        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set areaCode
     *
     * @param string $areaCode
     *
     * @return Friend
     */
    protected function setAreaCode($areaCode = null)
    {
        if (!is_null($areaCode)) {
            Assertion::maxLength($areaCode, 10);
        }

        $this->areaCode = $areaCode;

        return $this;
    }

    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Friend
     */
    protected function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::integerish($priority);

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set disallow
     *
     * @param string $disallow
     *
     * @return Friend
     */
    protected function setDisallow($disallow)
    {
        Assertion::notNull($disallow);
        Assertion::maxLength($disallow, 200);

        $this->disallow = $disallow;

        return $this;
    }

    /**
     * Get disallow
     *
     * @return string
     */
    public function getDisallow()
    {
        return $this->disallow;
    }

    /**
     * Set allow
     *
     * @param string $allow
     *
     * @return Friend
     */
    protected function setAllow($allow)
    {
        Assertion::notNull($allow);
        Assertion::maxLength($allow, 200);

        $this->allow = $allow;

        return $this;
    }

    /**
     * Get allow
     *
     * @return string
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * Set directMediaMethod
     *
     * @param string $directMediaMethod
     *
     * @return Friend
     */
    protected function setDirectMediaMethod($directMediaMethod)
    {
        Assertion::notNull($directMediaMethod);
        Assertion::choice($directMediaMethod, array (
          0 => 'invite',
          1 => 'update',
        ));

        $this->directMediaMethod = $directMediaMethod;

        return $this;
    }

    /**
     * Get directMediaMethod
     *
     * @return string
     */
    public function getDirectMediaMethod()
    {
        return $this->directMediaMethod;
    }

    /**
     * Set calleridUpdateHeader
     *
     * @param string $calleridUpdateHeader
     *
     * @return Friend
     */
    protected function setCalleridUpdateHeader($calleridUpdateHeader)
    {
        Assertion::notNull($calleridUpdateHeader);
        Assertion::choice($calleridUpdateHeader, array (
          0 => 'pai',
          1 => 'rpid',
        ));

        $this->calleridUpdateHeader = $calleridUpdateHeader;

        return $this;
    }

    /**
     * Get calleridUpdateHeader
     *
     * @return string
     */
    public function getCalleridUpdateHeader()
    {
        return $this->calleridUpdateHeader;
    }

    /**
     * Set updateCallerid
     *
     * @param string $updateCallerid
     *
     * @return Friend
     */
    protected function setUpdateCallerid($updateCallerid)
    {
        Assertion::notNull($updateCallerid);
        Assertion::choice($updateCallerid, array (
          0 => 'yes',
          1 => 'no',
        ));

        $this->updateCallerid = $updateCallerid;

        return $this;
    }

    /**
     * Get updateCallerid
     *
     * @return string
     */
    public function getUpdateCallerid()
    {
        return $this->updateCallerid;
    }

    /**
     * Set fromDomain
     *
     * @param string $fromDomain
     *
     * @return Friend
     */
    protected function setFromDomain($fromDomain = null)
    {
        if (!is_null($fromDomain)) {
            Assertion::maxLength($fromDomain, 190);
        }

        $this->fromDomain = $fromDomain;

        return $this;
    }

    /**
     * Get fromDomain
     *
     * @return string
     */
    public function getFromDomain()
    {
        return $this->fromDomain;
    }

    /**
     * Set directConnectivity
     *
     * @param string $directConnectivity
     *
     * @return Friend
     */
    protected function setDirectConnectivity($directConnectivity)
    {
        Assertion::notNull($directConnectivity);
        Assertion::choice($directConnectivity, array (
          0 => 'yes',
          1 => 'no',
        ));

        $this->directConnectivity = $directConnectivity;

        return $this;
    }

    /**
     * Get directConnectivity
     *
     * @return string
     */
    public function getDirectConnectivity()
    {
        return $this->directConnectivity;
    }

    /**
     * Set company
     *
     * @param \Core\Model\Company\Company $company
     *
     * @return Friend
     */
    protected function setCompany(\Core\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set country
     *
     * @param \Core\Model\Country\Country $country
     *
     * @return Friend
     */
    protected function setCountry(\Core\Model\Country\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Core\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set callACL
     *
     * @param \Core\Model\CallACL\CallACL $callACL
     *
     * @return Friend
     */
    protected function setCallACL(\Core\Model\CallACL\CallACL $callACL = null)
    {
        $this->callACL = $callACL;

        return $this;
    }

    /**
     * Get callACL
     *
     * @return \Core\Model\CallACL\CallACL
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * Set outgoingDDI
     *
     * @param \Core\Model\DDI\DDI $outgoingDDI
     *
     * @return Friend
     */
    protected function setOutgoingDDI(\Core\Model\DDI\DDI $outgoingDDI = null)
    {
        $this->outgoingDDI = $outgoingDDI;

        return $this;
    }

    /**
     * Get outgoingDDI
     *
     * @return \Core\Model\DDI\DDI
     */
    public function getOutgoingDDI()
    {
        return $this->outgoingDDI;
    }

    /**
     * Set language
     *
     * @param \Core\Model\Language\Language $language
     *
     * @return Friend
     */
    protected function setLanguage(\Core\Model\Language\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Core\Model\Language\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }



    // @codeCoverageIgnoreEnd
}

