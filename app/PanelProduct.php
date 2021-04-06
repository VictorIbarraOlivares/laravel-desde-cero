<?php

namespace App;

use App\Product;

class PanelProduct extends Product
{
    protected static function booted()
    {
        // se reescribe la funcion
    }

    public function getForeignKey()
    {
        $parent = get_parent_class($this);
        return (new $parent)->getForeignKey();
    }

    public function getMorphClass()
    {
        $parent = get_parent_class($this);
        return (new $parent)->getMorphClass();
    }
}
