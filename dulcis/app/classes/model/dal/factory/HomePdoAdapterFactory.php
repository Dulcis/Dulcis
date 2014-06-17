<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/17
 * Time: 21:37
 */

namespace Dulcis\Dulcis\model\dal\factory;
require_once(dirname(__FILE__) . '/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\dal\PdoAdapter;

class HomePdoAdapterFactory extends PdoAdapterAbstractFactory{
    private $pdoAdapter = null;

    function create() {

        $this->pdoAdapter = new PdoAdapter("mysql:dbname=dulcis;host=localhost", "root", "4MGaasdk");

        return $this->pdoAdapter;

    }
}