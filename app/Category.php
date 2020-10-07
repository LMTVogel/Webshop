<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'image',
    ];
    
    /**
     * Geeft alle producten terug die de overeenkomende foreign key 'cat_id' hebben.
     */
    public function showProducts()
    {
        // Stuurt alle producten mee met het overeenkomende cat_id.
        return $this->hasMany('App\Product', 'cat_id');
    }
}
