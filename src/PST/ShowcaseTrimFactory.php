<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 11/17/18
 * Time: 5:33 AM
 */

namespace PST;

use \PDO;
use \PDOException;


class ShowcaseTrimFactory extends AbstractFactory
{
    public function __construct($dbh, $master_factory, $obj = "PST\\ShowcaseTrimObject", $table = "showcasetrim", $id = "showcasetrim_id")
    {
        parent::__construct($dbh, $master_factory, $obj, $table, $id);
        $this->_datacols = array(
            "showcasemodel_id", "title", "description", "crs_trim_id", "page_id", "deleted", "thumbnail_photo", "updated", "url_title", "full_url", "short_title", "display_title", "customer_set_title", "retail_price", "engine_type", "transmission", "category", "customer_set_category", "customer_set_retail_price", "customer_set_engine_type", "customer_set_transmission", "customer_set_short_title"
        );
    }

    public function add($kvpArray)
    {
        $obj = parent::add($kvpArray); // TODO: Change the autogenerated stub
        $obj->fixURLTitle();
        return $obj;
    }
}