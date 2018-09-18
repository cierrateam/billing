<?php

namespace Cierrateam\Billing\Classes;

use Cierrateam\Billing\Contracts\BillingContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;


Class BillPosition extends Model
{
    use Makroable;
    protected $guarded = ['id'];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
