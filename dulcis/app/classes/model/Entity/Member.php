<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/06
 * Time: 1:20
 */

namespace Dulcis\Dulcis\model\Entity;


class Member extends EntityAbstract {

    protected $allowedFields = array('mno', 'mpass', 'mname', 'mmail', 'mpost', 'maddress', 'mtel', 'mpt', 'mcard');

    public function setMno($mno) {
        if (isset($this->fields["mno"])) {
            throw new BadMethodCallException(
                "The ID for this user has been set already.");
        }
        if (!is_int($mno) || $mno < 1) {
            throw new InvalidArgumentException(
                "The user ID is invalid.");
        }
        $this->fields["mno"] = $mno;
        return $this;
    }

    public function setMpass($mpass) {

        if (!preg_match("/^[a-zA-Z0-9]+$/", $mpass) || $mpass < 1 || $mpass > 7) {
            throw new InvalidArgumentException("無効です。");
        }
        $this->fields["mpass"]= $mpass;

        return $this;
    }

    public function setMname($mname) {

        if (strlen($mname) < 1 || strlen($mname) > 20) {
            throw new InvalidArgumentException("名前の文字数が無効です。");
        }
        $this->fields["mname"] = htmlspecialchars(trim($mname), ENT_QUOTES);

        return $this;
    }
} 