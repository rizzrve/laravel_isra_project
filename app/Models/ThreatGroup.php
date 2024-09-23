<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreatGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function threats()
    {
        return $this->hasMany(Threat::class);
    }
}
