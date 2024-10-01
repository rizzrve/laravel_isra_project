<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskTreatmentPlan extends Model
{
    use HasFactory;

    protected $table = 'risk_treatment_plan'; 
    
    protected $primaryKey = 'processID';

    protected $fillable = [
        'processID',
        'process',
        'threats',
        'vulnerabilities',
        'risk_level',
        'risk_owner',
        'treatment_option',
        'planned_safeguard',
        'start_date',
        'end_date',
        'residual_risk',
        'status',

    ];
}
