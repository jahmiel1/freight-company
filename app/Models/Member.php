<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_f',
        'trn',
        'el_mail',
        'numb',
        'add',
    ];

    public function alert()
    {
        return $this->hasMany(QuickAlert::class);
    }

    public function tracking()
    {
        return $this->hasMany(Tracking::class);
    }
    public function package()
    {
        return $this->hasMany(Package::class);
    }
}
