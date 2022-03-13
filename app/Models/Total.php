<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    use HasFactory;
    protected $table = "totals";

    /**
     * Get all of the comments for the Total
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function total_products()
    {
        return $this->hasMany(TotalProduct::class, 'total_id');
    }
}
