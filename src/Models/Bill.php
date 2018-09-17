<?php

namespace Cierrateam\Billing\Classes;

use Cierrateam\Billing\Contracts\BillingContract;
use Illuminate\Database\Eloquent\Model;


Class Bill extends Model
{
    protected $guarded = ['id'];

    public function bill_positions()
    {
        return $this->hasMany(BillPosition::class);
    }
}
