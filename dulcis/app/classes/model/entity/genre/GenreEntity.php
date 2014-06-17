<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    namespace Dulcis\Dulcis\model\entity\genre;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
    use BadMethodCallException;
    use Dulcis\Dulcis\model\entity\base\EntityAbstract;
    use InvalidArgumentException;

    /**
     * Class GenreEntity
     *
     * @package Dulcis\Dulcis\model\entity\genre
     *
     * @author dora56
     */
    class GenreEntity extends EntityAbstract{

        protected $allowedFields = array('id', 'gname');

        /**
         * @param $id
         *
         * @return $this
         * @throws InvalidArgumentException
         * @throws BadMethodCallException
         */
        public function setId($id){

            if (isset($this->fields["id"])) {
                throw new BadMethodCallException(
                    "The ID for this user has been set already.");
            }
            if (!is_int($id) || $id < 1) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields['gno'] = $id;

            return $this;
        }

        /**
         * @param $gname
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setGname($gname) {

            if (strlen($gname) < 1 || strlen($gname) > 20) {
                throw new InvalidArgumentException("名前の文字数が無効です。");
            }
            $this->fields["gname"] = htmlspecialchars(trim($gname), ENT_QUOTES);

            return $this;
        }
    }
