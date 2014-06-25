<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    namespace Dulcis\dulcis\test;

    require_once(dirname(__FILE__).'/../vendor/autoload.php');
    //use Dulcis\Dulcis\model\dal\collection\EntityCollectionInterface;
    use Dulcis\Dulcis\model\service\encode\JsonEncoder;
    use Dulcis\Dulcis\model\service\item\ItemService;
    //use Dulcis\Dulcis\model\entity\base\EntityInterface;
    //use Dulcis\Dulcis\model\repository\factory\MemberUoWFactory;
    //$object = new JsonEncoder;
    $service = new ItemService(new JsonEncoder());


    //$array =array(1,2);

    print_r($service->getItemsEncoded(array(1,2)));