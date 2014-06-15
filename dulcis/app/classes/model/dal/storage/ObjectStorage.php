<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/15
 * Time: 18:49
 */

namespace Dulcis\Dulcis\model\dal\storage;

use SplObjectStorage;

/**
 * Class ObjectStorage
 *
 * オブジェクトを貯蔵する
 *
 * @package Dulcis\Dulcis\model\dal\storage
 */
class ObjectStorage extends SplObjectStorage implements ObjectStorageInterface {

    /**
     *
     * ObjectStorageを空にする
     *
     */
    public function clear() {
        $tempStorage = clone $this;
        $this->addAll($tempStorage);
        $this->removeAll($tempStorage);
        $tempStorage = null;
    }
}