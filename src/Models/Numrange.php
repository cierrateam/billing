<?php

namespace Cierrateam\Billing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;

/**
 * Class Numrange
 *
 * @package Cierrateam\Billing\Models
 * @property int $id
 * @property int|null $next_range_id
 * @property int|null $storno_numrange_id
 * @property string $name
 * @property string|null $prefix
 * @property string|null $suffix
 * @property int $starts_at
 * @property int $increment
 * @property int $binding
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cierrateam\Billing\Models\Bill[] $bills
 * @property-read \Cierrateam\Billing\Models\Numrange|null $next_range
 * @property-read \Cierrateam\Billing\Models\Numrange $prev_range
 * @property-read \Cierrateam\Billing\Models\Numrange|null $storno_numrange
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereBinding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereIncrement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereNextRangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereStornoNumrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cierrateam\Billing\Models\Numrange whereUpdatedAt($value)
 * @mixin \Eloquent
 */
Class Numrange extends Model
{
    use Macroable;

    protected $guarded = ['id'];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function next_range() {
        return $this->belongsTo(Numrange::class);
    }

    public function storno_numrange() {
        return $this->belongsTo(Numrange::class);
    }

    public function prev_range() {
        return $this->hasOne(Numrange::class, 'next_range_id');
    }

}
