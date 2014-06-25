<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/25
 * Time: 20:32
 */

namespace Dulcis\Dulcis\model\dal\mapper;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\entity\base\EntityInterface;
use Dulcis\Dulcis\model\entity\genre\GenreEntity;

class GenreMappar extends AbstractDataMapper{

    protected function loadEntity(array $row) {
        return new GenreEntity(array(
            'id' => $row['gno'],
            'gname' => $row['gname']
        ));
    }
}