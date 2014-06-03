<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../../vendor/autoload.php';

use Dulcis\Dulcis\model\modeldata\Member;

$member1 = new Member(1,'password','root','foo@exsample.com','811-3217','Tokyo','080-2222-2222',0,378282246310005);

echo $member1->getName();