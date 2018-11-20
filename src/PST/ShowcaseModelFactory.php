<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 10/18/18
 * Time: 2:23 PM
 */

namespace PST;

use \PDO;
use \PDOException;


class ShowcaseModelFactory extends AbstractFactory
{
    public function __construct($dbh, $master_factory, $obj = "PST\\ShowcaseModelObject", $table = "showcasemodel", $id = "showcasemodel_id")
    {
        parent::__construct($dbh, $master_factory, $obj, $table, $id);
        $this->_datacols = array(
            "showcasemake_id", "year", "crs_model_id", "exclude", "thumbnail_photo", "showcasemachinetype_id", "deleted", "title", "updated", "page_id", "url_title", "full_url", "short_title", "display_title", "customer_set_title"
        );
    }
}