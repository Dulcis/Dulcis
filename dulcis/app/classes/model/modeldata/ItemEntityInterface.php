<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    namespace Dulcis\Dulcis\model\modeldata;

    /**
     * Interface CartEntityInterface
     *
     * @package Dulcis\Dulcis\model\modeldata
     *
     * @author dora56
     */
    interface ItemEntityInterface {

        public function setId($id);
        public function getId();

        public function setName($name);
        public function getName();

        public function setGenre($genre);
        public function getGenre();

        public function setPrice($price);
        public function getPrice();

        public function setStock($price);
        public function getStock();

        public function setComment($comment);
        public function getComment();
    }
