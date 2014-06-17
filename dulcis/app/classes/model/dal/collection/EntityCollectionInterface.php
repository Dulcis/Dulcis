<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/18
     * Time: 0:55
     */
    namespace Dulcis\Dulcis\model\dal\collection;

    require_once(dirname(__FILE__) . '/../../../../../../vendor/autoload.php');

    use Countable;
    use ArrayAccess;
    use IteratorAggregate;
    use Dulcis\Dulcis\model\entity\base\EntityInterface;

    interface EntityCollectionInterface extends Countable, ArrayAccess, IteratorAggregate {

        public function add(EntityInterface $entity);
        public function remove(EntityInterface $entity);
        public function get($key);
        public function exists($key);
        public function clear();
        public function toArray();
    }