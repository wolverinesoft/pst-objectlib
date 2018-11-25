<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 11/13/18
 * Time: 3:37 PM
 */

namespace PST;

use \PDO;
use \PDOException;

class PageObject extends AbstractObject
{
    public function __construct($dbh, $id, $data, $factory)
    {
        parent::__construct($dbh, $id, $data, $factory);
    }

    public function hasShowcaseSegment() {
        return ($this->hasShowcaseObject() || $this->get("page_class") == "Showroom Landing Page") && $this->get("page_class") != "Showroom Trim";
    }

    public function fixShowcaseSegment() {
        if ($this->hasShowcaseSegment()) {
            error_log("This one has page segments");
            $segments = $this->factory()->master()->pagesection()->fetch(array(
                "page_id" => $this->id(),
                "type" => "Factory Showroom"
            ));

            if (count($segments) == 0) {
                error_log("Zero count on segments");
                // add one...
                $widget_ordinal = 1 + intVal($this->factory()->master()->pagesection()->getMaxOrdinal(array("page_id" => $this->id())));
                error_log("Ordinal: " . $widget_ordinal);
                $this->factory()->master()->pagesection()->add(array(
                    "page_id" => $this->id(),
                    "type" => "Factory Showroom",
                    "ordinal" => $widget_ordinal
                ));
            }
        }
    }

    public function hasThumbnail() {
        return $this->hasShowcaseObject();
    }

    public function hasShowcaseObject() {
        return in_array($this->get("page_class"), array("Showroom Model", "Showroom Trim", "Showroom Make", "Showroom Machine Type"));
    }

    public function getShowcaseObject() {
        $factory = "showcase";
        switch ($this->get("page_class")) {
            case "Showroom Model":
                $factory .= "model";
                break;

            case "Showroom Trim":
                $factory .= "trim";
                break;

            case "Showroom Make":
                $factory .= "make";
                break;

            case "Showroom Machine Type":
                $factory .= "machinetype";
                break;

            default:
                return null;
        }

        $models = $this->factory()->master()->$factory()->fetch(array(
            "page_id" => $this->id()
        ));

        return (count($models) > 0) ? $models[0] : null;
    }

}