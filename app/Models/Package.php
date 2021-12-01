<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'member_id',
        'weight',
        'shipper',
        'shipper_address',
        'estimated_cost',
        'tracking_id',
    ];
    public function tracking()
    {
        return $this->hasMany(Member::class);
    }

}
