<?php

namespace app\models;

trait DateFormatter
{
    public function convertStrDateToFormat($date, $oldFormat, $newFormat)
    {
        $datetime = \DateTime::createFromFormat($oldFormat, $date);
        if (!empty($datetime)) {
            return $datetime->format($newFormat);
        }
        return null;
    }
}