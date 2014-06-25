<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/25
     * Time: 20:50
     */

    namespace Dulcis\Dulcis\model\repository\item;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use \Dulcis\Dulcis\model\repository\base\AbstractUnitOfWork;

class GenreUnitOfWork extends AbstractUnitOfWork implements GenreUnitOfWorkInterface{

    public function fetchByGno($gno) {
        return $this->dataMapper->fetchById($gno);
    }

    public function fetchByGname($gname) {
        return $this->dataMapper->fetchByColumns(array("gname" => $gname));
    }
}