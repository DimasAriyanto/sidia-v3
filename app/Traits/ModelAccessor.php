<?php

namespace App\Traits;

trait ModelAccessor
{
    public static function getFillableColumn()
    {
        return (new self)->getFillable();
    }

    public static function getTableName()
    {
        return (new self)->getTable();
    }
}