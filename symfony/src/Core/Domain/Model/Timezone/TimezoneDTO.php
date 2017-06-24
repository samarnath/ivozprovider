<?php

namespace Core\Domain\Model\Timezone;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TimezoneDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tz;

    /**
     * @var string
     */
    private $comment = '';

    /**
     * @var string
     */
    private $timeZoneLabel = '';

    /**
     * @column timeZoneLabel_en
     * @var string
     */
    private $timeZoneLabelEn = '';

    /**
     * @column timeZoneLabel_es
     * @var string
     */
    private $timeZoneLabelEs = '';

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
            'id' => $this->getId(),
            'tz' => $this->getTz(),
            'comment' => $this->getComment(),
            'timeZoneLabel' => $this->getTimeZoneLabel(),
            'timeZoneLabelEn' => $this->getTimeZoneLabelEn(),
            'timeZoneLabelEs' => $this->getTimeZoneLabelEs(),
            'countryId' => $this->getCountryId()
        ];
    }

    /**
     * @param array $data
     * @return self
     * @deprecated
     *
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setTz(isset($data['tz']) ? $data['tz'] : null)
            ->setComment(isset($data['comment']) ? $data['comment'] : null)
            ->setTimeZoneLabel(isset($data['timeZoneLabel']) ? $data['timeZoneLabel'] : null)
            ->setTimeZoneLabelEn(isset($data['timeZoneLabelEn']) ? $data['timeZoneLabelEn'] : null)
            ->setTimeZoneLabelEs(isset($data['timeZoneLabelEs']) ? $data['timeZoneLabelEs'] : null)
            ->setCountryId(isset($data['countryId']) ? $data['countryId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->country = $transformer->transform('Core\\Domain\\Model\\Country\\Country', $this->getCountryId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

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
     * @param string $timeZoneLabel
     *
     * @return TimezoneDTO
     */
    public function setTimeZoneLabel($timeZoneLabel)
    {
        $this->timeZoneLabel = $timeZoneLabel;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeZoneLabel()
    {
        return $this->timeZoneLabel;
    }

    /**
     * @param string $timeZoneLabelEn
     *
     * @return TimezoneDTO
     */
    public function setTimeZoneLabelEn($timeZoneLabelEn)
    {
        $this->timeZoneLabelEn = $timeZoneLabelEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeZoneLabelEn()
    {
        return $this->timeZoneLabelEn;
    }

    /**
     * @param string $timeZoneLabelEs
     *
     * @return TimezoneDTO
     */
    public function setTimeZoneLabelEs($timeZoneLabelEs)
    {
        $this->timeZoneLabelEs = $timeZoneLabelEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeZoneLabelEs()
    {
        return $this->timeZoneLabelEs;
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
     * @return \Core\Domain\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}

