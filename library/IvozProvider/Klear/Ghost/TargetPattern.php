<?php
use Core\Application\DTO\PricingPlansRelTargetPatternDTO;

class IvozProvider_Klear_Ghost_TargetPattern extends KlearMatrix_Model_Field_Ghost_Abstract {

    public function getTargetPattern($model)
    {
        if ($GLOBALS['sf']) {
            if (!$model instanceof PricingPlansRelTargetPatternDTO) {
                Throw new \Exception('model must be an instance of PricingPlansRelTargetPatternDTO');
            }
        } else if (!$GLOBALS['sf']) {
            if (!$model instanceof \IvozProvider\Model\Raw\PricingPlansRelTargetPatterns) {
                Throw new \Exception('model must be an instance of IvozProvider\Model\Raw\PricingPlansRelTargetPatterns');
            }
        }

        if ($GLOBALS['sf']) {

            if ($model->getTargetPatternId()) {
                $dataGateway = \Zend_Registry::get('data_gateway');
                $pattern = $dataGateway->find('Core\\Model\\TargetPattern\\TargetPattern', $model->getTargetPatternId());
            }

            if (isset($pattern)) {
                return $pattern->getName().' ('.$pattern->getRegExp().')';
            }

        } else if (!$GLOBALS['sf']) {

            if ($model->getTargetPattern() && $model->getTargetPattern()->getName()) {
                return $model->getTargetPattern()->getName().' ('.$model->getTargetPattern()->getRegExp().')';
            }
        }

        return '';
    }

    public function getOrderBy($model) {
        # En esta función también se recibe el $model

        # Devolvemos el valor generado para el ORDER BY
        return "FIELD(campo,".implode(',',valoresOrdenados).")";
    }

    public function getSearchConditionsForItem($values, $searchOps, $model) {

        if ($GLOBALS['sf']) {
            if (!$model instanceof PricingPlansRelTargetPatternDTO) {
                Throw new \Exception('model must be an instance of PricingPlansRelTargetPatternDTO');
            }

        } else if (!$GLOBALS['sf']) {

            if (!$model instanceof \IvozProvider\Model\Raw\PricingPlansRelTargetPatterns) {
                Throw new \Exception('model must be an instance of IvozProvider\Model\Raw\PricingPlansRelTargetPatterns');
            }
        }

        $conditions = array();
        $condition = array();

        foreach ($values as $term) {
            if (is_numeric($term)) {
                $condition[] = "`regExp` LIKE '%".$term."%'";
            } elseif (substr($term, 0, 1) == '(') {
                $term = str_replace("(","",$term);
                $condition[] = "`regExp` LIKE '".$term."%'";
            } else {
                $condition[] = "`name_en` LIKE '%".str_replace(' ','%',$term)."%'";
                $condition[] = "`name_es` LIKE '%".str_replace(' ','%',$term)."%'";
            }

            $conditions[] = '('.implode(' OR ',$condition).')';
        }

        if ($GLOBALS['sf']) {

            $dataGateway = \Zend_Registry::get('data_gateway');
            $targetPatterns = $dataGateway->findBy('Core\\Model\\TargetPattern\\TargetPattern', $where);

        } else if (!$GLOBALS['sf']) {

            $mapperTargetPattern = new \IvozProvider\Mapper\Sql\TargetPatterns();
            $targetPatterns = $mapperTargetPattern->fetchList(implode(' AND ',$conditions));
        }

        $targetPatternsIds = array();

        foreach ($targetPatterns as $targetPattern) {
            $targetPatternsIds[] = $targetPattern->getId();
        }

        if (count($targetPatternsIds) > 0) {
            $where = 'targetPatternId IN ('.implode(',',$targetPatternsIds).')';
            return $where;
        }

        return false;
    }

    protected function _filterAutocompletePrincingPlans($term) {
        if (is_numeric($term)) {
            $condition[] = "`regExp` like '%".$term."%'";
        } elseif (substr($term, 0, 1) == '(') {
            $term = str_replace("(","",$term);
            $condition[] = "`regExp` like '".$term."%'";
        } else {
            $condition[] = "(`name_en` LIKE '%".str_replace(' ','%',$term)."%' OR `name_es` LIKE '%".str_replace(' ','%',$term)."%')";
        }
    }
}
