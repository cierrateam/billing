<?php

namespace Cierrateam\Billing\Classes;

use Cierrateam\Billing\Contracts\BillingContract;
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
}
