<?php

namespace Cierrateam\Billing\Models;

use App\User;
use Cierrateam\Billing\Contracts\BillContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;

/**
 * Class Bill
 *
 * @package Cierrateam\Billing\Models
 * @property int $id
 * @property int $numrange_id
 * @property int|null $canceled_bill_id
 * @property string $number
 * @property int|null $user_id
 * @property int $days_to_pay
 * @property int $netto
 * @property int $tax_percent
 * @property int $total
 * @property int $payed
 * @property int $status
 * @property int $discount_percent
 * @property string|null $receiver_name
 * @property string|null $receiver_address
 * @property string|null $receiver_umstid
 * @property int $accepted
 * @property string|null $accepted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cierrateam\Billing\Models\BillPosition[] $bill_positions
 * @property-read \Cierrateam\Billing\Models\Bill|null $canceled_bill
 * @property-read \Cierrateam\Billing\Models\Numrange $numrange
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereAcceptedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereCanceledBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereDaysToPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereDiscountPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereNetto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereNumrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill wherePayed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereReceiverAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereReceiverName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereReceiverUmstid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereTaxPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Bill whereUserId($value)
 * @mixin \Eloquent
 */
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

}
