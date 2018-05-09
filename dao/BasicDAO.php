<?php
/**
 * Created by PhpStorm.
 * User: LorisGrether
 * Date: 08.05.2018
 * Time: 15:40
 */

namespace dao;

use database\Database;
use \PDO;

class BasicDAO
{
    /**
     * @AttributeType PDO
     */
    protected $pdoInstance;

    /**
     * @access public
     * @param PDO pdoInstance
     * @ParamType pdoInstance PDO
     */
    public function __construct(PDO $pdoInstance = null) {
        if(is_null($pdoInstance)){
            $this->pdoInstance = Database::connect();
        } else {
            $this->pdoInstance = $pdoInstance;
        }
    }
}
?>