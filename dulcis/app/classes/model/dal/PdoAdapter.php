<?php
    namespace Dulcis\Dulcis\model\dal;

    use PDO;
    use PDOException;
    use RuntimeException;

    require_once(dirname(__FILE__).'/../../../../../vendor/autoload.php');

    /**
     * Class PdoAdapter
     *
     * PDO接続とCRUD処理をするAdapter
     *
     * @package Dulcis\Dulcis\model\dal
     *
     * @author dora56
     */
    class PdoAdapter implements DatabaseAdapterInterface{
        private $config = array();
        private $connection;
        private $statement;
        private $fetchMode = PDO::FETCH_ASSOC;

        /**
         * @param       $dsn 接続先
         * @param null  $username ユーザー名
         * @param null  $password パスワード
         * @param array $driverOptions
         */
        public function __construct($dsn, $username = null,
                                    $password = null, array $driverOptions = array()) {

            $this->config = compact("dsn", "username", "password", "driverOptions");
        }

        /**
         * プリベアードステートメントを返す
         *
         * @return mixed
         * @throws PDOException
         */
        public function getStatement() {

            if ($this->statement === null) {
                throw new PDOException("There is no PDOStatement object for use.");
            }
            return $this->statement;
        }

        /**
         * PDO設定
         *
         * @throws RunTimeException
         */
        public function connect() {

            if ($this->connection) {
                return;
            }

            try {
                $this->connection = new PDO(
                    $this->config["dsn"],
                    $this->config["username"],
                    $this->config["password"],
                    $this->config["driverOptions"]);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(
                    PDO::ATTR_EMULATE_PREPARES, false);
            }
            catch (PDOException $e) {
                throw new RunTimeException($e->getMessage());
            }
        }

        /**
         * PDO切断
         */
        public function disconnect() {
            $this->connection = null;
        }

        /**
         * 文を実行する準備を行い、文オブジェクトを返す
         *
         * @param       $sql　   SQL文
         * @param array $options プリベアードステートメントの設定
         *
         * @return $this
         * @throws \RuntimeException
         */
        public function prepare($sql, array $options = array()) {

            $this->connect();
            try {
                $this->statement = $this->connection->prepare($sql,
                    $options);
                return $this;
            }
            catch (PDOException $e) {
                throw new RunTimeException($e->getMessage());
            }
        }

        /**
         * プリペアドステートメントを実行する
         *
         *
         * @param array $parameters パラメータ
         *
         * @return $this
         * @throws \RuntimeException
         */
        public function execute(array $parameters = array()) {

            try {
                $this->getStatement()->execute($parameters);
                return $this;
            }
            catch (PDOException $e) {
                throw new RunTimeException($e->getMessage());
            }
        }

        /**
         * トランザクション開始
         */
        public function beginTransaction() {

            $this->connection->beginTransaction();
        }

        /**
         * コミット
         */
        public function commit() {
            $this->connection->commit();
        }

        /**
         * ロールバック
         */
        public function rollBack() {
            $this->connection->rollBack();
        }

        /**
         * 直近の SQL ステートメントによって作用した行数を返す
         *
         * @return mixed
         * @throws \RuntimeException
         */
        public function countAffectedRows() {
            try {
                return $this->getStatement()->rowCount();
            }
            catch (PDOException $e) {
                throw new RunTimeException($e->getMessage());
            }
        }

        /**
         * 最後に挿入された行の ID あるいはシーケンスの値を返す
         *
         * @param null $name
         *
         * @return mixed
         * @throws \RuntimeException
         */
        public function getLastInsertId($name = null) {
            try {
                return $this->connection->lastInsertId($name);
            }
            catch (PDOException $e) {
                throw new RunTimeException($e->getMessage());
            }
        }

        /**
         * 結果セットから次の行を取得する
         *
         * @param null $fetchStyle
         * @param null $cursorOrientation
         * @param null $cursorOffset
         *
         * @return mixed
         * @throws \RuntimeException
         */
        public function fetch($fetchStyle = null, $cursorOrientation = null, $cursorOffset = null) {

            if ($fetchStyle === null) {
                $fetchStyle = $this->fetchMode;
            }

            try {
                return $this->getStatement()->fetch($fetchStyle,
                    $cursorOrientation, $cursorOffset);
            }
            catch (PDOException $e) {
                throw new RunTimeException($e->getMessage());
            }
        }

        /**
         * 全ての結果行を含む配列を返す
         *
         * @param null $fetchStyle
         * @param int  $column
         *
         * @return mixed
         * @throws \RuntimeException
         */
        public function fetchAll($fetchStyle = null, $column = 0) {

            if ($fetchStyle === null) {
                $fetchStyle = $this->fetchMode;
            }

            try {
                return $fetchStyle === PDO::FETCH_COLUMN
                    ? $this->getStatement()->fetchAll($fetchStyle, $column)
                    : $this->getStatement()->fetchAll($fetchStyle);
            }
            catch (PDOException $e) {
                throw new RunTimeException($e->getMessage());
            }
        }

        /**
         * SELECT文の実行
         *
         * @param        $table
         * @param array  $bind
         * @param string $boolOperator
         *
         * @return $this
         */
        public function select($table, array $bind, $boolOperator = "AND") {
            if ($bind) {
                $where = array();
                foreach ($bind as $col => $value) {
                    unset($bind[$col]);
                    $bind[":" . $col] = $value;
                    $where[] = $col . " = :" . $col;
                }
            }

            $sql = "SELECT * FROM " . $table
                . (($bind) ? " WHERE "
                    . implode(" " . $boolOperator . " ", $where) : " ");
            $this->prepare($sql)
                ->execute($bind);
            return $this;
        }

        /**
         * INSERT文の実行
         *
         * @param       $table
         * @param array $bind
         *
         * @return int
         */
        public function insert($table, array $bind) {

            $cols = implode(", ", array_keys($bind));
            $values = implode(", :", array_keys($bind));
            foreach ($bind as $col => $value) {
                unset($bind[$col]);
                $bind[":" . $col] = $value;
            }

            $sql = "INSERT INTO " . $table . " (" . $cols . ")  VALUES (:"
                . $values . ")";

            $this->prepare($sql)->execute($bind);

            return (int) $this->getLastInsertId();
        }

        /**
         * UPDATE文の実行
         *
         * @param        $table
         * @param array  $bind
         * @param string $where
         *
         * @return mixed
         */
        public function update($table, array $bind, $where = "") {

            $set = array();
            foreach ($bind as $col => $value) {
                unset($bind[$col]);
                $bind[":" . $col] = $value;
                $set[] = $col . " = :" . $col;
            }

            $sql = "UPDATE " . $table . " SET " . implode(", ", $set)
                . (($where) ? " WHERE " . $where : " ");

            $this->prepare($sql)->execute($bind);

            return $this->countAffectedRows();
        }

        /**
         * DELETE文の実行
         *
         * @param        $table
         * @param string $where
         *
         * @return mixed
         */
        public function delete($table, $where = "") {

            $sql = "DELETE FROM " . $table . (($where) ? " WHERE " . $where : " ");

            $this->prepare($sql)->execute();

            return $this->countAffectedRows();
        }
    }
