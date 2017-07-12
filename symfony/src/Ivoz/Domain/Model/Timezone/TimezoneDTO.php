<?php

namespace Ivoz\Domain\Model\Timezone;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TimezoneDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $tz;

    /**
     * @var string
     */
    private $comment = '';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label = '';

    /**
     * @var string
     */
    private $labelEn = '';

    /**
     * @var string
     */
    private $labelEs = '';

    /**
     * @var mixed
     */
    private $countryId;

    /**
     * @var mixed
     */
    private $country;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'tz' => $this->getTz(),
            'comment' => $this->getComment(),
            'id' => $this->getId(),
            'labelLabel' => $this->getLabelLabel(),
            'labelEn' => $this->getLabelEn(),
            'labelEs' => $this->getLabelEs(),
            'countryId' => $this->getCountryId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->country = $transformer->transform('Ivoz\\Domain\\Model\\Country\\Country', $this->getCountryId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $tz
     *
     * @return TimezoneDTO
     */
    public function setTz($tz)
    {
        $this->tz = $tz;

        return $this;
    }

    /**
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * @param string $comment
     *
     * @return TimezoneDTO
     */
    public function setComment($comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param integer $id
     *
     * @return TimezoneDTO
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
     * @param string $label
     *
     * @return TimezoneDTO
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $labelEn
     *
     * @return TimezoneDTO
     */
    public function setLabelEn($labelEn)
    {
        $this->labelEn = $labelEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabelEn()
    {
        return $this->labelEn;
    }

    /**
     * @param string $labelEs
     *
     * @return TimezoneDTO
     */
    public function setLabelEs($labelEs)
    {
        $this->labelEs = $labelEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabelEs()
    {
        return $this->labelEs;
    }

    /**
     * @param integer $countryId
     *
     * @return TimezoneDTO
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
}

