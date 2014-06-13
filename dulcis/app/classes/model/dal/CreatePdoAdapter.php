<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\dal;

require_once(dirname(__FILE__).'/../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\dal\LocalPdoAdapterFactry;
use Exception;

/**
 * Description of CreatePdoAdapter
 *
 * @author dora56
 */
class CreatePdoAdapter {
    
    const LOCAL = "local";
    const PUB = "pub";
    
    private $pdo;


    public function __construct($status) {
        $this->setPdoAdapter($status);
    }
    
    public function setPdoAdapter($status) {
        
         switch ($status) {
            case self::LOCAL:
                $this->pdo = new LocalPdoAdapterFactry();               
                break;
            case self::PUB:
                $this->pdo = null;
            default:
                throw new Exception("設定がまちがってます。");
        }
    }
}
