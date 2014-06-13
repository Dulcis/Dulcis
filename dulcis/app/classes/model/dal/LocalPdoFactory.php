<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\dal;

require_once(dirname(__FILE__).'/../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\dal\PdoAdapterAbstractFactory;
use Dulcis\Dulcis\model\dal\PdoAdapter;
/**
 * Description of CreatePdoAdapter
 *
 * @author student
 */
class LocalPdoAdapterFactry extends PdoAdapterAbstractFactory{
    
    private  $pdodapter = null;
    public function create() {
        
        $this->pdodapter = new PdoAdapter("mysql:dbname=dulcis;host=172.20.17.214", "user1", "");
        
        return $this->pdodapter;
    }
}
