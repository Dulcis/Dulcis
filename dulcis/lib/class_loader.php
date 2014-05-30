<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/05/22
     * Time: 19:45
     */

    /**
     * Classが定義されていない場合に、ファイルを探すクラス
     *
     * コピペです。 http://qiita.com/misogi@github/items/8d02f2eac9a91b4e6215
     * @author dora56
     */
    class ClassLoader {

        private static $dirs;

        /**
         * クラスが見つからなかった場合呼び出されるメソッド
         *
         * spl_autoload_register でこのメソッドを登録してください
         *
         * @param  string $class 名前空間など含んだクラス名
         * @return bool 成功すればtrue
         */
        public static function loadClass($class) {
            foreach (self::directories() as $directory) {
                // 名前空間や疑似名前空間をここでパースして
                // 適切なファイルパスにしてください
                $file_name = "{$directory}/{$class}.php";

                if (is_file($file_name)) {
                    require $file_name;

                    return true;
                }
            }
        }


        /**
         * ディレクトリリスト
         * @return array フルパスのリスト
         */
        private static function directories() {
            if (empty(self::$dirs)) {
                $base = "./";
                self::$dirs = array(
                    // ここに読み込んでほしいディレクトリを足していきます
                    $base . 'lib/',
                    $base . 'app/classes/model/',
                    $base . 'app/view/'
                );
            }

            return self::$dirs;
        }

    }

    spl_autoload_register(array('ClassLoader', 'loadClass'));