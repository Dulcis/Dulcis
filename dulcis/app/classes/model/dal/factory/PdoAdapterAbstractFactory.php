<?php
    namespace Dulcis\Dulcis\model\dal\factory;

    /**
     * Class PdoAdapterAbstractFactory
     *
     * AbstractFactoryパターンの抽象クラス
     *
     * @package Dulcis\Dulcis\model\dal\factory
     * @author dora56
     */
    abstract class PdoAdapterAbstractFactory {

        abstract public function create();
    }
