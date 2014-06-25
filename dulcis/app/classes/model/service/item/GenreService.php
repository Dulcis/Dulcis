<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/25
     * Time: 20:55
     */

    namespace Dulcis\Dulcis\model\service\item;
    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\repository\item\GenreUnitOfWorkInterface;
    use Dulcis\Dulcis\model\service\encode\EncoderInterface;
    use Dulcis\Dulcis\model\service\encode\EncoderTrait;

    class GenreService {
        use EncoderTrait;
        private $uow;

        public function __construct(GenreUnitOfWorkInterface $factory,EncoderInterface $encoder) {

            $this->uow = $factory;
            $this->encoder = $encoder;
        }

        public function  getGenre($gno){
            return $this->uow->fetchByGno($gno);
        }


        public function  getGenreEncoded($gno){

            $genre = $this->uow->fetchByGno($gno);
            return $this->getEncoder()->setEntityData($genre)->encode();
        }
        public function addGenre(){
            return null;
        }
        public function deleteGenre() {
            return null;
        }
        public function addGenres() {
            return null;
        }
    }