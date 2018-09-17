<?php

namespace Cierrateam\Billing\Classes;

use Cierrateam\Billing\Contracts\BillingContract;
use Illuminate\Database\Eloquent\Model;


Class Numrange extends Model
{
    protected $guarded = ['id'];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
