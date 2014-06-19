<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/19
 * Time: 23:40
 */

namespace Dulcis\Dulcis\model\dal\repository\base;

require_once(dirname(__FILE__).'/../../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\entity\base\EntityInterface;

interface UnitOfWorkInterface {
    public function registerNew(EntityInterface $entity);
    public function registerClean(EntityInterface $entity);
    public function registerDirty(EntityInterface $entity);
    public function registerDeleted(EntityInterface $entity);
    public function commit();
    public function rollback();
    public function clear();
} 