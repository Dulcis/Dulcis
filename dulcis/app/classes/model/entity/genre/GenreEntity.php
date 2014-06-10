<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\entity\genre;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\entity\base\EntityAbstract;
/**
 * Description of GenreEntity
 *
 * @author 
 */
class GenreEntity extends EntityAbstract{
    
    protected $allowedFields = array('gno', 'gname');
    
    public function setGno($gno){
        
        if (isset($this->fields["gno"])) {
                throw new BadMethodCallException(
                    "The ID for this user has been set already.");
        }
        if (!is_int($gno) || $gno < 1) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields['gno'] = $gno;

            return $this;       
    }
    
    public function setGname($gname) {

            if (strlen($gname) < 1 || strlen($gname) > 20) {
                throw new InvalidArgumentException("名前の文字数が無効です。");
            }
            $this->fields["gname"] = htmlspecialchars(trim($gname), ENT_QUOTES);

            return $this;
        }
}
