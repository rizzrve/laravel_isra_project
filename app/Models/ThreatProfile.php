<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ThreatProfile extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'tp';

    protected $fillable = [
        'threatType',
        'threatDescription'
    ];
}
