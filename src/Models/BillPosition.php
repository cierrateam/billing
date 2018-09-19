<?php

namespace Cierrateam\Billing\Models;

use Cierrateam\Billing\Contracts\BillingContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;

/**
 * Class BillPosition
 *
 * @package Cierrateam\Billing\Models
 * @property int $id
 * @property int $bill_id
 * @property string|null $name
 * @property string|null $description
 * @property int $amount
 * @property string $unit
 * @property string $price
 * @property int $percent_discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Cierrateam\Billing\Models\Bill $bill
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition wherePercentDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\BillPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
Class BillPosition extends Model
{
    use Macroable;
    protected $guarded = ['id'];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

}
