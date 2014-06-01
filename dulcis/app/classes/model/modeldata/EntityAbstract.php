<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/05/30
     * Time: 18:05
     */
    namespace model\modeldata;

    /**
     * Class AbstractEntity
     *
     * エンティティの抽象クラス
     *
     * @package modeldata
     */
    abstract class EntityAbstract {

        /**
         * アクセサ(取得メソッド)に存在しないプロパティの設定をマッピングする。
         * そうでなければ、一致するフィールドを使用する。
         */
        public function __get($name) {

            $field = '_' . strtolower($name);
            //プロパティの確認
            if (!property_exists($this, $field)) {
                throw new InvalidArgumentException(
                    "Getting the field '$field' is not valid for this entity.");
            }
            $accessor = 'get' . ucfirst(strtolower($name));

            return (method_exists($this, $accessor) &&
                is_callable(array($this, $accessor)))
                ? $this->$accessor() : $this->field;
        }

        /**
         * ミューテータ(設定メソッド)に存在しないフィールドの設定をマッピングする。
         * そうでなければ、一致するフィールドを使用する。
         */
        public function __set($name, $value) {

            $field = "_" . strtolower($name);
            if (!property_exists($this, $field)) {
                throw new InvalidArgumentException(
                    "Setting the field '$field' is not valid for this entity.");
            }
            $mutator = "set" . ucfirst(strtolower($name));
            if (method_exists($this, $mutator) &&
                is_callable(array($this, $mutator))
            ) {
                $this->$mutator($value);
            } else {
                $this->$field = $value;
            }

            return $this;
        }

        /**
         * エンティティフィールドを取得.
         */
        public function toArray() {

            return get_object_vars($this);
        }
    }