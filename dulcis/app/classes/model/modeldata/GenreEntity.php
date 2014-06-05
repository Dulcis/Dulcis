<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/05
 * Time: 20:42
 */

namespace Dulcis\Dulcis\model\modeldata;


use BadMethodCallException;
use InvalidArgumentException;

class GenreEntity extends EntityAbstract implements GenreIEntityInterface {

    protected $_id;
    protected $_name;

    public function __construct($name) {

        $this->setName($name);
    }

    public function setId($id) {

        if ($this->_id !== null) {
            throw new BadMethodCallException(
                "その番号はすでに設定されています。");
        }
        if (!is_int($id) || $id < 1 || $id > 99) {
            throw new InvalidArgumentException("ジャンル番号が無効です。");
        }
        $this->_id = $id;

        return $this;

    }

    public function getId() {

        return $this->_id;
    }

    public function setName($name) {

        if (strlen($name < 1) || strlen($name > 25)) {
            throw new InvalidArgumentException("ジャンル名が無効です。");
        }
    }

    public function getName() {
        // TODO: Implement getName() method.
    }
}