<?php

class IvozProvider_Klear_Ghost_OutgoingRouteType extends KlearMatrix_Model_Field_Ghost_Abstract
{
    /**
     *
     * @param $model OutgoingRoute
     * @return name of target based on outgoing route type
     */
    public function getData ($model)
    {
        $outgoingRouteType = $model->getType();

        if ($GLOBALS['sf']) {

            /** @var $model Core\Application\DTO\OutgoingRoutingDTO **/

            $dataGateway = \Zend_Registry::get('data_gateway');

            if ($outgoingRouteType == 'group') {

                $routingPatternGroup = $dataGateway->find(
                    'Core\\Model\\RoutingPatternGroup\\RoutingPatternGroup',
                    $model->getRoutingPatternGroupId()
                );

                return $routingPatternGroup->getName();

            } elseif ($outgoingRouteType == 'pattern') {

                $routingPattern = $dataGateway->find(
                    'Core\\Model\\RoutingPattern\\RoutingPattern',
                    $model->getRoutingPatternId()
                );

                return $routingPattern->getName();
            }

        } else if (!$GLOBALS['sf']) {

            if ($outgoingRouteType == 'group') {
                return $model->getRoutingPatternGroup()->getName();
            } elseif ($outgoingRouteType == 'pattern') {
                return $model->getRoutingPattern()->getName();
            }
        }

        return null;
    }
}
