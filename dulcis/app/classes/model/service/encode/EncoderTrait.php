<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/25
     * Time: 21:56
     */

    namespace Dulcis\Dulcis\model\service\encode;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use RuntimeException;

    trait EncoderTrait {

        protected $encoder;

        public function setEncoder(EncoderInterface $encoder) {
            $this->encoder = $encoder;
            return $this;
        }

        public function getEncoder(){
            if ($this->encoder === null) {
                throw new RuntimeException(
                    "There is not an encoder to use.");
            }
            return $this->encoder;
        }
    }