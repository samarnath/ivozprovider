<?php

/**
 * Application Model
 *
 * @package IvozProvider\Model
 * @subpackage Model
 * @author Luis Felipe Garcia
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * 
 *
 * @package IvozProvider\Model
 * @subpackage Model
 * @author Luis Felipe Garcia
 */
 
namespace IvozProvider\Model;
class AstPsEndpoints extends Raw\AstPsEndpoints
{
    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }

    /**
     * @deprecated
     */
    public function getAstPsAor()
    {
        $aorMapper = new \IvozProvider\Mapper\Sql\AstPsAors();
        return $aorMapper->findOneByField("sorcery_id", $this->getSorceryId());
    }

}
