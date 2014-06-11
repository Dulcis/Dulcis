<?php
    /**
     *
     */
namespace Dulcis\Dulcis\model\modeldata;

use Dulcis\Dulcis\model\modeldata\MemberInterface;
use Dulcis\Dulcis\model\modeldata\ItemEntityInterface;

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

public function setMember(MemberInterface $member);
public function getMember();

public function setItem(ItemEntityInterface $item);
public function getItem();

public function setQuantity($quantity);
public function getQuantity();

}
