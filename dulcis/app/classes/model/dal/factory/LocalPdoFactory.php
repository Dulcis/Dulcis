<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\dal\factory;

require_once(dirname(__FILE__) . '/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\dal\PdoAdapter;
/**
 * LocalPdoAdapterFactory
 *
 * @author student
 */
class LocalPdoAdapterFactory extends PdoAdapterAbstractFactory{
    
    private  $pdo_adapter = null;
    public function create() {
        
        $this->pdo_adapter = new PdoAdapter("mysql:dbname=dulcis;host=172.20.17.214", "user1", "");
        
        return $this->pdo_adapter;
    }
}
