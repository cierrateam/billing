<?php

namespace Cierrateam\Billing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;


Class Numrange extends Model
{
    use Macroable;

    protected $guarded = ['id'];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function next_range() {
        return $this->belongsTo(Numrange::class);
    }

    public function storno_numrange() {
        return $this->belongsTo(Numrange::class);
    }

    public function prev_range() {
        return $this->hasOne(Numrange::class, 'next_range_id');
    }

    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }
}
