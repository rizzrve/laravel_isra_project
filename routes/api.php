<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreatController;
use App\Http\Controllers\VulnerabilityController;

use App\Http\Controllers\RiskAssessmentController;

Route::get('/threats/group/{groupId}', [ThreatController::class, 'getThreatsByGroup']);
Route::get('/vulnerabilities/group/{groupId}', [VulnerabilityController::class, 'getVulnerabilitiesByGroup']);

