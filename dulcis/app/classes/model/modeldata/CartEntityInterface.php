<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\modeldata;

/**
 *Interface CartEntityInterface
 * 
 * @package Dulcis\Dulcis\model\modeldata
 * 
 * @author dora56
 */
interface CartEntityInterface {
    
public function setId($id);
public function getId();

public function setMemberId($memberId);
public function getMemberId();

public function setItemId($itemId);
public function getItemId();

public function setQuantity($quantity);
public function getQuantity();

}
