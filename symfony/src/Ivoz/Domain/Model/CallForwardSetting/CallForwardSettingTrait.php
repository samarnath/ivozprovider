<?php

namespace Ivoz\Domain\Model\CallForwardSetting;

/**
 * CallForwardSetting
 */
trait CallForwardSettingTrait
{
    public function toArrayPortal()
    {
        /**
         * @var CallACL $this
         */
        $response = array();

        $response['id'] = $this->getId();
        $response['userId'] = $this->getUser()->getId();

        $numberValue = $this->getNumberValue();
        settype($numberValue, "integer");

        $response['callTypeFilter'] = $this->getCallTypeFilter();
        $response['callForwardType'] = $this->getCallForwardType();
        $response['targetType'] = $this->getTargetType();
        $response['numberValue'] = $numberValue;
        $response['extensionId'] = $this->getExtension()->getId();

        $response['extensionId'] = null;
        $response['extension'] = '';
        $extension = $this->getExtension();

        if (!is_null($extension)) {
            $response['extensionId'] = $extension->getId();
            $response['extension'] = $extension->getNumber();
        }

        $voiceMailUser = $this->getVoiceMailUser();
        $response['voiceMailUserId'] = $voiceMailUser
            ? $voiceMailUser->getId()
            : null;
        $response['voiceMailUser'] = $voiceMailUser
            ? $this->getVoiceMailUser()->getFullName()
            : '';
        $response['noAnswerTimeout'] = $this->getNoAnswerTimeout();

        return $response;
    }
}

