<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dulcis\dulcis\test;

require_once(dirname(__FILE__).'/../vendor/autoload.php');

use Dulcis\Dulcis\model\service\encode\JsonEncoder;
use Dulcis\Dulcis\model\repository\factory\MemberUoWFactory;

$object = new JsonEncoder;
        $uow = new MemberUoWFactory();
        $Member = $uow->create()->fetchByMname('tanaka');
        var_dump($Member);
        $Members = $Member->toArray();
        var_dump($Members);
        $user= array();
        function gene($Members) {
            foreach ($Members as $key){
                yield $key->toArray();
            }
        }
        
        foreach(gene($Members) as $key => $val){
            $user[$key] = $val;
        }
        //var_dump($user);
        //$object->setData($Members);
        //var_dump($object->encode());