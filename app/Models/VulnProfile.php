<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VulnProfile extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'vp';

    protected $fillable = [
        'vulnType',
        'vulnDescription'
    ];
}
