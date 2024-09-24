<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'threat_group_id',
    ];

    // Define the relationship to ThreatGroup
    public function threatGroup()
    {
        return $this->belongsTo(ThreatGroup::class);
    }
}
