<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/25
     * Time: 22:09
     */

    namespace Dulcis\Dulcis\model\service\item;
    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
    use Dulcis\Dulcis\model\repository\factory\GenreUoWFacatory;
    use Dulcis\Dulcis\model\repository\factory\ItemUoWFactory;
    use Dulcis\Dulcis\model\service\encode\EncoderInterface;
    use Dulcis\Dulcis\model\service\encode\EncoderTrait;
    class ItemService {
        use EncoderTrait;
        private $itemUow;
        private $genreUow;

        public function __construct(EncoderInterface $encoder) {

            $itemUnitOfWork = new ItemUoWFactory();
            $genreUnitOfWork = new GenreUoWFacatory();
            $this->itemUow = $itemUnitOfWork->create();
            $this->genreUow = $genreUnitOfWork->create();
            $this->encoder = $encoder;
        }

        public function getItem($ino){
            $item = $this->itemUow->fetchByIno($ino)->toArray();
            $genre = $this->genreUow->fetchByGno($item['gno'])->toArray();

            $marge = array_merge($item,$genre);
            unset($marge['gno']);
            return $marge;
        }

        public function getItemEncoded($ino){

            return $this->getEncoder()->setArrayData($this->getItem($ino))->encode();
        }

        public function getItems($items){
            foreach ($items as $key => $val) {
                $genreAndItems[$key] = $this->getItem($val);
            }
            return $genreAndItems;
        }

        public function getItemsEncoded($items){
            return $this->getEncoder()->setArrayData($this->getItems($items))->encode();
        }
    }