<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/15
     * Time: 18:46
     */
    namespace Dulcis\Dulcis\model\dal\storage;

    use Countable;
    use Iterator;
    use ArrayAccess;
    /**
     * Interface ObjectStorageInterface
     *
     * @package Dulcis\Dulcis\model\dal\storage
     */
    interface ObjectStorageInterface extends Countable, Iterator, ArrayAccess{
        public function attach($object, $data = null);
        public function detach($object);
        public function clear();
    }