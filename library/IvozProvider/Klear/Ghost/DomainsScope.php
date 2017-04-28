<?php

class IvozProvider_Klear_Ghost_DomainsScope extends KlearMatrix_Model_Field_Ghost_Abstract
{
    /**
     *
     * @param $model Domains
     *            model
     * @return name of target based on domain scope
     */
    public function getData ($model)
    {
        $domainScope = $model->getScope();

        if ($domainScope == 'global') {
            return 'Global';
        } else if ($domainScope == 'company') {

            if ($GLOBALS['sf']) {

                $dataGateway = \Zend_Registry::get('data_gateway');
                $company = $dataGateway->find('Core:Company\\Company', $model->getCompanyId());
                $companyName = $company->getName() . ' (company)';

            } else if (!$GLOBALS['sf']) {
                $companyName = $model->getCompany()->getName() . ' (company)';
            }

            return $companyName;
        } elseif ($domainScope == 'brand') {

            if ($GLOBALS['sf']) {

                $dataGateway = \Zend_Registry::get('data_gateway');
                $brand = $dataGateway->find('Core:Brand\\Brand', $model->getBrandId());
                $brandName = $brand->getName() . ' (company)';

            } else if (!$GLOBALS['sf']) {
                $brandName = $model->getBrand()->getName() . ' (brand)';
            }


            return $brandName;
        } else {
            // Outgoing Route with unexpected Type
            return null;
        }
    }
}
