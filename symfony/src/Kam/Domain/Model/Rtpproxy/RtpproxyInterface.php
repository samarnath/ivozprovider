<?php

namespace Kam\Domain\Model\Rtpproxy;



interface RtpproxyInterface
{
    /**
     * Get setid
     *
     * @return string
     */
    public function getSetid();


    /**
     * Get url
     *
     * @return string
     */
    public function getUrl();


    /**
     * Get flags
     *
     * @return integer
     */
    public function getFlags();


    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get mediaRelaySet
     *
     * @return \Ivoz\Domain\Model\MediaRelaySet\MediaRelaySetInterface
     */
    public function getMediaRelaySet();



}

