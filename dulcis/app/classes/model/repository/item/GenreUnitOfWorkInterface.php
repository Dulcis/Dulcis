<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/25
     * Time: 20:46
     */

    namespace Dulcis\Dulcis\model\repository\item;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\repository\base\UnitOfWorkInterface;

    interface GenreUnitOfWorkInterface extends UnitOfWorkInterface{
        public function fetchByGno($gno);
        public function fetchByGname($gname);
    }