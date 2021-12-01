<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'member_id',
        'package_type',
        'branch_name',
    ];
    
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

}
