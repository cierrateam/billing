<?php

namespace Cierrateam\Billing\Models;

use Cierrateam\Billing\Contracts\BillingContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;


Class BillPosition extends Model
{
    use Macroable;
    protected $guarded = ['id'];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
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
