<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class KamTrunksUacregDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @column l_uuid
     * @var string
     */
    public $lUuid = '';

    /**
     * @column l_username
     * @var string
     */
    public $lUsername = 'unused';

    /**
     * @column l_domain
     * @var string
     */
    public $lDomain = 'unused';

    /**
     * @column r_username
     * @var string
     */
    public $rUsername = '';

    /**
     * @column r_domain
     * @var string
     */
    public $rDomain = '';

    /**
     * @var string
     */
    public $realm = '';

    /**
     * @column auth_username
     * @var string
     */
    public $authUsername = '';

    /**
     * @column auth_password
     * @var string
     */
    public $authPassword = '';

    /**
     * @column auth_proxy
     * @var string
     */
    public $authProxy = '';

    /**
     * @var integer
     */
    public $expires = '0';

    /**
     * @var integer
     */
    public $flags = '0';

    /**
     * @column reg_delay
     * @var integer
     */
    public $regDelay = '0';

    /**
     * @var boolean
     */
    public $multiddi = '0';

    /**
     * @var mixed
     */
    public $brandId;

    /**
     * @var mixed
     */
    public $peeringContractId;

    /**
     * @var mixed
     */
    public $brand;

    /**
     * @var mixed
     */
    public $peeringContract;

    /**
     * @return array
     */
    public function __toArray()
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
            'brandId' => $this->getBrandId(),
            'peeringContractId' => $this->getPeeringContractId()
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
            ->setLUuid(isset($data['lUuid']) ? $data['lUuid'] : null)
            ->setLUsername(isset($data['lUsername']) ? $data['lUsername'] : null)
            ->setLDomain(isset($data['lDomain']) ? $data['lDomain'] : null)
            ->setRUsername(isset($data['rUsername']) ? $data['rUsername'] : null)
            ->setRDomain(isset($data['rDomain']) ? $data['rDomain'] : null)
            ->setRealm(isset($data['realm']) ? $data['realm'] : null)
            ->setAuthUsername(isset($data['authUsername']) ? $data['authUsername'] : null)
            ->setAuthPassword(isset($data['authPassword']) ? $data['authPassword'] : null)
            ->setAuthProxy(isset($data['authProxy']) ? $data['authProxy'] : null)
            ->setExpires(isset($data['expires']) ? $data['expires'] : null)
            ->setFlags(isset($data['flags']) ? $data['flags'] : null)
            ->setRegDelay(isset($data['regDelay']) ? $data['regDelay'] : null)
            ->setMultiddi(isset($data['multiddi']) ? $data['multiddi'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setPeeringContractId(isset($data['peeringContractId']) ? $data['peeringContractId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Model\\Brand\\Brand', $this->getBrandId());
        $this->peeringContract = $transformer->transform('Core\\Model\\PeeringContract\\PeeringContract', $this->getPeeringContractId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return KamTrunksUacregDTO
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
     * @param string $lUuid
     *
     * @return KamTrunksUacregDTO
     */
    public function setLUuid($lUuid)
    {
        $this->lUuid = $lUuid;

        return $this;
    }

    /**
     * @return string
     */
    public function getLUuid()
    {
        return $this->lUuid;
    }

    /**
     * @param string $lUsername
     *
     * @return KamTrunksUacregDTO
     */
    public function setLUsername($lUsername)
    {
        $this->lUsername = $lUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getLUsername()
    {
        return $this->lUsername;
    }

    /**
     * @param string $lDomain
     *
     * @return KamTrunksUacregDTO
     */
    public function setLDomain($lDomain)
    {
        $this->lDomain = $lDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getLDomain()
    {
        return $this->lDomain;
    }

    /**
     * @param string $rUsername
     *
     * @return KamTrunksUacregDTO
     */
    public function setRUsername($rUsername)
    {
        $this->rUsername = $rUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getRUsername()
    {
        return $this->rUsername;
    }

    /**
     * @param string $rDomain
     *
     * @return KamTrunksUacregDTO
     */
    public function setRDomain($rDomain)
    {
        $this->rDomain = $rDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getRDomain()
    {
        return $this->rDomain;
    }

    /**
     * @param string $realm
     *
     * @return KamTrunksUacregDTO
     */
    public function setRealm($realm)
    {
        $this->realm = $realm;

        return $this;
    }

    /**
     * @return string
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * @param string $authUsername
     *
     * @return KamTrunksUacregDTO
     */
    public function setAuthUsername($authUsername)
    {
        $this->authUsername = $authUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthUsername()
    {
        return $this->authUsername;
    }

    /**
     * @param string $authPassword
     *
     * @return KamTrunksUacregDTO
     */
    public function setAuthPassword($authPassword)
    {
        $this->authPassword = $authPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->authPassword;
    }

    /**
     * @param string $authProxy
     *
     * @return KamTrunksUacregDTO
     */
    public function setAuthProxy($authProxy)
    {
        $this->authProxy = $authProxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthProxy()
    {
        return $this->authProxy;
    }

    /**
     * @param integer $expires
     *
     * @return KamTrunksUacregDTO
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param integer $flags
     *
     * @return KamTrunksUacregDTO
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param integer $regDelay
     *
     * @return KamTrunksUacregDTO
     */
    public function setRegDelay($regDelay)
    {
        $this->regDelay = $regDelay;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRegDelay()
    {
        return $this->regDelay;
    }

    /**
     * @param boolean $multiddi
     *
     * @return KamTrunksUacregDTO
     */
    public function setMultiddi($multiddi)
    {
        $this->multiddi = $multiddi;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMultiddi()
    {
        return $this->multiddi;
    }

    /**
     * @param integer $brandId
     *
     * @return KamTrunksUacregDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $peeringContractId
     *
     * @return KamTrunksUacregDTO
     */
    public function setPeeringContractId($peeringContractId)
    {
        $this->peeringContractId = $peeringContractId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeeringContractId()
    {
        return $this->peeringContractId;
    }

    /**
     * @return \Core\Model\PeeringContract\PeeringContract
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }
}

