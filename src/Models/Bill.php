<?php

namespace Cierrateam\Billing\Models;

use Cierrateam\Billing\Contracts\BillContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;


Class Bill extends Model implements BillContract
{
    use Macroable;

    protected $guarded = ['id'];

    public function bill_positions()
    {
        return $this->hasMany(BillPosition::class);
    }

    public function numrange() {
        return $this->belongsTo(Numrange::class);
    }

    public function canceled_bill() {
        return $this->belongsTo(Bill::class);
    }
    public function user() {
        return  $this->belongsTo(User::class);
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
