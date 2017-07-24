<?php

namespace Ivoz\Domain\Model\CallACL;

use Doctrine\Common\Collections\Criteria;
use Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPattern;

trait CallACLTrait
{
    public function dstIsCallable($dst)
    {
        /**
         * @var CallACL $this
         */
        $defaultPolicy = $this->getDefaultPolicy();

        $criteria = Criteria
            ::create()
            ->orderBy(['priority' => Criteria::ASC]);

        $aclRelPatterns = $this->getRelPatterns($criteria);

        /**
         * @var CallACLRelPattern $aclRelPattern
         */
        foreach($aclRelPatterns as $aclRelPattern) {
            $aclPattern = $aclRelPattern->getCallACLPattern();
            $policy = $aclRelPattern->getPolicy();
            $pattern = $aclPattern->getRegExp();
            $match = preg_match('/'.$pattern.'/', $dst);

            if($match) {
                return 'allow' === $policy;
            }
        }

        return 'allow' === $defaultPolicy;
    }
}

