<?php

namespace Core\Model\KamTrunksUacreg;

use Assert\Assertion;
use Core\Application\DTO\KamTrunksUacregDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * KamTrunksUacreg
 */
class KamTrunksUacreg implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @column l_uuid
     * @var string
     */
    protected $lUuid = '';

    /**
     * @column l_username
     * @var string
     */
    protected $lUsername = 'unused';

    /**
     * @column l_domain
     * @var string
     */
    protected $lDomain = 'unused';

    /**
     * @column r_username
     * @var string
     */
    protected $rUsername = '';

    /**
     * @column r_domain
     * @var string
     */
    protected $rDomain = '';

    /**
     * @var string
     */
    protected $realm = '';

    /**
     * @column auth_username
     * @var string
     */
    protected $authUsername = '';

    /**
     * @column auth_password
     * @var string
     */
    protected $authPassword = '';

    /**
     * @column auth_proxy
     * @var string
     */
    protected $authProxy = '';

    /**
     * @var integer
     */
    protected $expires = '0';

    /**
     * @var integer
     */
    protected $flags = '0';

    /**
     * @column reg_delay
     * @var integer
     */
    protected $regDelay = '0';

    /**
     * @var boolean
     */
    protected $multiddi = '0';

    /**
     * @var \Core\Model\Brand\Brand
     */
    protected $brand;

    /**
     * @var \Core\Model\PeeringContract\PeeringContract
     */
    protected $peeringContract;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $lUuid,
        $lUsername,
        $lDomain,
        $rUsername,
        $rDomain,
        $realm,
        $authUsername,
        $authPassword,
        $authProxy,
        $expires,
        $flags,
        $regDelay,
        $multiddi
    ) {
        $this->setLUuid($lUuid);
        $this->setLUsername($lUsername);
        $this->setLDomain($lDomain);
        $this->setRUsername($rUsername);
        $this->setRDomain($rDomain);
        $this->setRealm($realm);
        $this->setAuthUsername($authUsername);
        $this->setAuthPassword($authPassword);
        $this->setAuthProxy($authProxy);
        $this->setExpires($expires);
        $this->setFlags($flags);
        $this->setRegDelay($regDelay);
        $this->setMultiddi($multiddi);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return KamTrunksUacregDTO
     */
    public static function createDTO()
    {
        return new KamTrunksUacregDTO();
    }

    /**
     * Factory method
     * @param KamTrunksUacregDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamTrunksUacregDTO::class);

        $self = new self(
            $dto->getLUuid(),
            $dto->getLUsername(),
            $dto->getLDomain(),
            $dto->getRUsername(),
            $dto->getRDomain(),
            $dto->getRealm(),
            $dto->getAuthUsername(),
            $dto->getAuthPassword(),
            $dto->getAuthProxy(),
            $dto->getExpires(),
            $dto->getFlags(),
            $dto->getRegDelay(),
            $dto->getMultiddi()
        );

        return $self
            ->setBrand($dto->getBrand())
            ->setPeeringContract($dto->getPeeringContract());
    }

    /**
     * @param KamTrunksUacregDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamTrunksUacregDTO::class);

        $this
            ->setLUuid($dto->getLUuid())
            ->setLUsername($dto->getLUsername())
            ->setLDomain($dto->getLDomain())
            ->setRUsername($dto->getRUsername())
            ->setRDomain($dto->getRDomain())
            ->setRealm($dto->getRealm())
            ->setAuthUsername($dto->getAuthUsername())
            ->setAuthPassword($dto->getAuthPassword())
            ->setAuthProxy($dto->getAuthProxy())
            ->setExpires($dto->getExpires())
            ->setFlags($dto->getFlags())
            ->setRegDelay($dto->getRegDelay())
            ->setMultiddi($dto->getMultiddi())
            ->setBrand($dto->getBrand())
            ->setPeeringContract($dto->getPeeringContract());


        return $this;
    }

    /**
     * @return KamTrunksUacregDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setLUuid($this->getLUuid())
            ->setLUsername($this->getLUsername())
            ->setLDomain($this->getLDomain())
            ->setRUsername($this->getRUsername())
            ->setRDomain($this->getRDomain())
            ->setRealm($this->getRealm())
            ->setAuthUsername($this->getAuthUsername())
            ->setAuthPassword($this->getAuthPassword())
            ->setAuthProxy($this->getAuthProxy())
            ->setExpires($this->getExpires())
            ->setFlags($this->getFlags())
            ->setRegDelay($this->getRegDelay())
            ->setMultiddi($this->getMultiddi())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setPeeringContractId($this->getPeeringContract() ? $this->getPeeringContract()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'lUuid' => $this->getLUuid(),
            'lUsername' => $this->getLUsername(),
            'lDomain' => $this->getLDomain(),
            'rUsername' => $this->getRUsername(),
            'rDomain' => $this->getRDomain(),
            'realm' => $this->getRealm(),
            'authUsername' => $this->getAuthUsername(),
            'authPassword' => $this->getAuthPassword(),
            'authProxy' => $this->getAuthProxy(),
            'expires' => $this->getExpires(),
            'flags' => $this->getFlags(),
            'regDelay' => $this->getRegDelay(),
            'multiddi' => $this->getMultiddi(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'peeringContractId' => $this->getPeeringContract() ? $this->getPeeringContract()->getId() : null
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
     * Set lUuid
     *
     * @param string $lUuid
     *
     * @return KamTrunksUacreg
     */
    protected function setLUuid($lUuid)
    {
        Assertion::notNull($lUuid);
        Assertion::maxLength($lUuid, 64);

        $this->lUuid = $lUuid;

        return $this;
    }

    /**
     * Get lUuid
     *
     * @return string
     */
    public function getLUuid()
    {
        return $this->lUuid;
    }

    /**
     * Set lUsername
     *
     * @param string $lUsername
     *
     * @return KamTrunksUacreg
     */
    protected function setLUsername($lUsername)
    {
        Assertion::notNull($lUsername);
        Assertion::maxLength($lUsername, 64);

        $this->lUsername = $lUsername;

        return $this;
    }

    /**
     * Get lUsername
     *
     * @return string
     */
    public function getLUsername()
    {
        return $this->lUsername;
    }

    /**
     * Set lDomain
     *
     * @param string $lDomain
     *
     * @return KamTrunksUacreg
     */
    protected function setLDomain($lDomain)
    {
        Assertion::notNull($lDomain);
        Assertion::maxLength($lDomain, 190);

        $this->lDomain = $lDomain;

        return $this;
    }

    /**
     * Get lDomain
     *
     * @return string
     */
    public function getLDomain()
    {
        return $this->lDomain;
    }

    /**
     * Set rUsername
     *
     * @param string $rUsername
     *
     * @return KamTrunksUacreg
     */
    protected function setRUsername($rUsername)
    {
        Assertion::notNull($rUsername);
        Assertion::maxLength($rUsername, 64);

        $this->rUsername = $rUsername;

        return $this;
    }

    /**
     * Get rUsername
     *
     * @return string
     */
    public function getRUsername()
    {
        return $this->rUsername;
    }

    /**
     * Set rDomain
     *
     * @param string $rDomain
     *
     * @return KamTrunksUacreg
     */
    protected function setRDomain($rDomain)
    {
        Assertion::notNull($rDomain);
        Assertion::maxLength($rDomain, 190);

        $this->rDomain = $rDomain;

        return $this;
    }

    /**
     * Get rDomain
     *
     * @return string
     */
    public function getRDomain()
    {
        return $this->rDomain;
    }

    /**
     * Set realm
     *
     * @param string $realm
     *
     * @return KamTrunksUacreg
     */
    protected function setRealm($realm)
    {
        Assertion::notNull($realm);
        Assertion::maxLength($realm, 64);

        $this->realm = $realm;

        return $this;
    }

    /**
     * Get realm
     *
     * @return string
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * Set authUsername
     *
     * @param string $authUsername
     *
     * @return KamTrunksUacreg
     */
    protected function setAuthUsername($authUsername)
    {
        Assertion::notNull($authUsername);
        Assertion::maxLength($authUsername, 64);

        $this->authUsername = $authUsername;

        return $this;
    }

    /**
     * Get authUsername
     *
     * @return string
     */
    public function getAuthUsername()
    {
        return $this->authUsername;
    }

    /**
     * Set authPassword
     *
     * @param string $authPassword
     *
     * @return KamTrunksUacreg
     */
    protected function setAuthPassword($authPassword)
    {
        Assertion::notNull($authPassword);
        Assertion::maxLength($authPassword, 64);

        $this->authPassword = $authPassword;

        return $this;
    }

    /**
     * Get authPassword
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->authPassword;
    }

    /**
     * Set authProxy
     *
     * @param string $authProxy
     *
     * @return KamTrunksUacreg
     */
    protected function setAuthProxy($authProxy)
    {
        Assertion::notNull($authProxy);
        Assertion::maxLength($authProxy, 64);

        $this->authProxy = $authProxy;

        return $this;
    }

    /**
     * Get authProxy
     *
     * @return string
     */
    public function getAuthProxy()
    {
        return $this->authProxy;
    }

    /**
     * Set expires
     *
     * @param integer $expires
     *
     * @return KamTrunksUacreg
     */
    protected function setExpires($expires)
    {
        Assertion::notNull($expires);
        Assertion::integerish($expires);

        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set flags
     *
     * @param integer $flags
     *
     * @return KamTrunksUacreg
     */
    protected function setFlags($flags)
    {
        Assertion::notNull($flags);
        Assertion::integerish($flags);

        $this->flags = $flags;

        return $this;
    }

    /**
     * Get flags
     *
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Set regDelay
     *
     * @param integer $regDelay
     *
     * @return KamTrunksUacreg
     */
    protected function setRegDelay($regDelay)
    {
        Assertion::notNull($regDelay);
        Assertion::integerish($regDelay);

        $this->regDelay = $regDelay;

        return $this;
    }

    /**
     * Get regDelay
     *
     * @return integer
     */
    public function getRegDelay()
    {
        return $this->regDelay;
    }

    /**
     * Set multiddi
     *
     * @param boolean $multiddi
     *
     * @return KamTrunksUacreg
     */
    protected function setMultiddi($multiddi)
    {
        Assertion::notNull($multiddi);
        Assertion::between(intval($multiddi), 0, 1);

        $this->multiddi = $multiddi;

        return $this;
    }

    /**
     * Get multiddi
     *
     * @return boolean
     */
    public function getMultiddi()
    {
        return $this->multiddi;
    }

    /**
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return KamTrunksUacreg
     */
    protected function setBrand(\Core\Model\Brand\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set peeringContract
     *
     * @param \Core\Model\PeeringContract\PeeringContract $peeringContract
     *
     * @return KamTrunksUacreg
     */
    protected function setPeeringContract(\Core\Model\PeeringContract\PeeringContract $peeringContract)
    {
        $this->peeringContract = $peeringContract;

        return $this;
    }

    /**
     * Get peeringContract
     *
     * @return \Core\Model\PeeringContract\PeeringContract
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }



    // @codeCoverageIgnoreEnd
}

