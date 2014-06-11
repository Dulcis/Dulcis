<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/06
     * Time: 1:10
     */
    namespace Dulcis\Dulcis\model\entity\base;


    use InvalidArgumentException;

    /**
     * Class EntityAbstract
     *
     * @package Dulcis\Dulcis\model\entity\base
     *
     * @author dora56
     */
    class EntityAbstract implements EntityInterface{

        protected $fields = array();
        protected $allowedFields = array();

        /**
         * @param array $fields
         */
        public function __construct(array $fields = array()) {
            if (!empty($fields)) {
                foreach ($fields as $name => $value) {
                    $this->$name = $value;
                }
            }
        }

        /**
         * @param $name
         * @param $value
         *
         * @return $this
         */
        public function setField($name, $value) {
            return $this->__set($name, $value);
        }

        /**
         * @param $name
         *
         * @return mixed
         */
        public function getField($name) {
            return $this->__get($name);
        }

        /**
         * @param $name
         *
         * @return bool
         */
        public function fieldExists($name) {
            return $this->__isset($name);
        }

        /**
         * @param $name
         *
         * @return $this
         */
        public function removeField($name) {
            return $this->__unset($name);
        }

        public function toArray() {
            return $this->fields;
        }

        /**
         * @param $name
         * @param $value
         *
         * @return $this
         */
        public function __set($name, $value) {
            $this->checkAllowedFields($name);
            $mutator = "set" . ucfirst(strtolower($name));
            if (method_exists($this, $mutator) &&
                is_callable(array($this, $mutator))) {
                $this->$mutator($value);
            }
            else {
                $this->fields[$name] = $value;
            }
            return $this;
        }

        /**
         * @param $name
         *
         * @return mixed
         * @throws \InvalidArgumentException
         */
        public function __get($name) {
            $this->checkAllowedFields($name);
            $accessor = "get" . ucfirst($name);
            if (method_exists($this, $accessor) &&
                is_callable(array($this, $accessor))) {
                return $this->$accessor();
            }
            if (!$this->__isset($name)) {
                throw new InvalidArgumentException(
                    "The field '$name' has not been set for this entity yet.");
            }
            return $this->fields[$name];
        }

        /**
         * @param $name
         *
         * @return bool
         */
        public function __isset($name) {
            $this->checkAllowedFields($name);
            return isset($this->fields[$name]);
        }

        /**
         * @param $name
         *
         * @return $this
         * @throws \InvalidArgumentException
         */
        public function __unset($name) {
            $this->checkAllowedFields($name);
            if (!$this->__isset($name)) {
                throw new InvalidArgumentException(
                    "The field " . $name . " has not been set for this entity yet.");
            }
            unset($this->fields[$name]);
            return $this;
        }

        /**
         * @param $field
         *
         * @throws \InvalidArgumentException
         */
        protected function checkAllowedFields($field) {
            if (!in_array($field, $this->allowedFields)) {
                throw new InvalidArgumentException(
                    "The requested operation on the field '$field' is not allowed for this entity.");
            }
        }
    }