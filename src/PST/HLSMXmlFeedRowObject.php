<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 7/6/18
 * Time: 2:18 PM
 */

namespace PST;

use \PDO;
use \PDOException;

class HLSMXmlFeedRowObject extends AbstractObject {
    public function __construct($dbh, $id, $data, $factory)
    {
        parent::__construct($dbh, $id, $data, $factory);
    }
}