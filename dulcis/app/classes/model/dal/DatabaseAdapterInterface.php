<?php
    namespace Dulcis\Dulcis\model\dal;

    /**
     * Interface DatabaseAdapterInterface
     *
     * データベースアクセスレイヤーのインターフェース
     *
     * @package Dulcis\Dulcis\model\dal
     *
     * @author dora56
     */
    interface DatabaseAdapterInterface {

        //DB接続と切断
        public function connect();
        public function disconnect();

        //クエリ発行とプリペアドステートメント実行
        public function prepare($sql, array $options = array());
        public function execute(array $parameters = array());

        //カラムのフェッチ
        public function fetch($fetchStyle = null,
                              $cursorOrientation = null, $cursorOffset = null);
        public function fetchAll($fetchStyle = null, $column = 0);

        //CRUD
        public function select($table, array $bind, $boolOperator = "AND");
        public function insert($table, array $bind);
        public function update($table, array $bind, $where = "");
        public function delete($table, $where = "");
    }
