<?php

namespace Cierrateam\Billing\Classes;

use Cierrateam\Billing\Contracts\BillingContract;
use Illuminate\Database\Eloquent\Model;


Class BillPosition extends Model
{
    protected $guarded = ['id'];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
