<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/18
 * Time: 0:58
 */

namespace Dulcis\Dulcis\model\dal\collection;


use ArrayIterator;
use Dulcis\Dulcis\model\entity\base\EntityInterface;
use InvalidArgumentException;
use Traversable;

class EntityCollection implements EntityCollectionInterface{

    protected $entities = array();

    public function __construct(array $entities = array())
    {
        if (!empty($entities)) {
            $this->entities = $entities;
        }
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     *       <b>Traversable</b>
     */
    public function getIterator() {
        return new ArrayIterator($this->entities);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $key <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($key) {
        return $key instanceof EntityInterface
            ? array_search($key, $this->entities)
            : isset($this->entities[$key]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $key <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     */
    public function offsetGet($key) {
        if (isset($this->entities[$key])) {
            return $this->entities[$key];
        }
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $key    <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $entity <p>
     *                      The value to set.
     *                      </p>
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function offsetSet($key, $entity) {
        if (!$entity instanceof EntityInterface) {
            throw new InvalidArgumentException(
                "Could not add the entity to the collection.");
        }
        if (!isset($key)) {
            $this->entities[] = $entity;
        }
        else {
            $this->entities[$key] = $entity;
        }
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $key <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     */
    public function offsetUnset($key) {
        if ($key instanceof EntityInterface) {
            $this->entities = array_filter($this->entities,
                function ($v) use ($key) {
                    return $v !== $key;
                });
        }
        else if (isset($this->entities[$key])) {
            unset($this->entities[$key]);
        }
    }

    /**
     * エンティティを追加
     *
     * @param EntityInterface $entity
     */
    public function add(EntityInterface $entity) {
        $this->offsetSet($key = null, $entity);
    }

    /**
     * エンティティを削除
     *
     * @param EntityInterface $entity
     */
    public function remove(EntityInterface $entity) {
        $this->offsetUnset($entity);
    }

    /**
     * 指定したエンティティを返す
     *
     * @param $key
     */
    public function get($key) {
        $this->offsetGet($key);
    }

    /**
     * 指定したエンティティの存在を確認する
     *
     * @param $key
     *
     * @return bool
     */
    public function exists($key) {
        return $this->offsetExists($key);
    }

    public function clear() {
        $this->entities = array();
    }

    public function toArray() {
        return $this->entities;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *       </p>
     *       <p>
     *       The return value is cast to an integer.
     */
    public function count() {
        return count($this->entities);
}}