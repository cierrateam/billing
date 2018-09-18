<?php

namespace Cierrateam\Billing\Classes;

use Cierrateam\Billing\Contracts\BillingContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;


Class Bill extends Model
{
    use Makroable;

    protected $guarded = ['id'];

    public function bill_positions()
    {
        return $this->hasMany(BillPosition::class);
    }
}
