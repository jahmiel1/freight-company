<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickAlert extends Model
{
    use HasFactory;

    protected $illable = [
        'reciept',
        'weight',
        'tracking_number',
        'shipper',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
