<?php

namespace App\Http\Controllers;

use App\Models\RiskAssessment;
use App\Models\AssetRegister;
use App\Models\Vulnerability;
use App\Models\Threat;
use App\Models\ThreatGroup;
use App\Models\VulnerabilityGroup;
use Illuminate\Http\Request;

class RiskAssessmentController extends Controller
{
    // Display all risk assessments
    public function index()
    {
        $riskAssessments = RiskAssessment::with(['threatGroup', 'threat', 'vulnerabilityGroup', 'vulnerability'])
            ->paginate(10);

        return view('risk_assessments.index', compact('riskAssessments'));
    }

    // Show create form
    public function create()
    {
        $assets = AssetRegister::all();
        $vulnerabilityGroups = VulnerabilityGroup::with('vulnerabilities')->get();
        $threatGroups = ThreatGroup::with('threats')->get();
        
        return view('risk_assessments.create', compact('assets', 'vulnerabilityGroups', 'threatGroups'));
    }

    // Store new risk assessment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_id' => 'required|exists:asset_register,asset_id',
            'threat_group_id' => 'required|exists:threat_groups,id',
            'threat_id' => 'required|exists:threats,id',
            'vulnerability_group_id' => 'required|exists:vulnerability_groups,id',
            'vulnerability_id' => 'required|exists:vulnerabilities,id',
            'confidentiality' => 'required|integer',
            'integrity' => 'required|integer',
            'availability' => 'required|integer',
            'personnel' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date',
            'likelihood' => 'required|in:Low,Medium,High',
            'impact' => 'required|in:Low,Medium,High',
            'risk_level' => 'required|in:Low,Medium,High',
            'risk_owner' => 'required|string|max:255',
            'mitigation_option' => 'required|string',
            'treatment' => 'nullable|string',
        ]);

        RiskAssessment::create($validated);
        return redirect()->route('risk_assessments.index')->with('success', 'Risk Assessment created successfully.');
    }

    // Show edit form
    public function edit($id)
{
    // Eager load related models
    $riskAssessment = RiskAssessment::with(['threatGroup.threats', 'vulnerabilityGroup.vulnerabilities'])->findOrFail($id);
    $assets = AssetRegister::all();
    $vulnerabilityGroups = VulnerabilityGroup::with('vulnerabilities')->get();
    $threatGroups = ThreatGroup::with('threats')->get();
    
    return view('risk_assessments.edit', compact('riskAssessment', 'assets', 'vulnerabilityGroups', 'threatGroups'));
}

    // Update risk assessment
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'asset_id' => 'required|exists:asset_register,asset_id',
            'threat_group_id' => 'required|exists:threat_groups,id',
            'threat_id' => 'required|exists:threats,id',
            'vulnerability_group_id' => 'required|exists:vulnerability_groups,id',
            'vulnerability_id' => 'required|exists:vulnerabilities,id',
            'confidentiality' => 'required|integer',
            'integrity' => 'required|integer',
            'availability' => 'required|integer',
            'personnel' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date',
            'likelihood' => 'required|in:Low,Medium,High',
            'impact' => 'required|in:Low,Medium,High',
            'risk_level' => 'required|in:Low,Medium,High',
            'risk_owner' => 'required|string|max:255',
            'mitigation_option' => 'required|string',
            'treatment' => 'nullable|string',
        ]);

        $riskAssessment = RiskAssessment::findOrFail($id);
        $riskAssessment->update($validated);

        return redirect()->route('risk_assessments.index')->with('success', 'Risk Assessment updated successfully.');
    }

    // Delete risk assessment
    public function destroy($id)
    {
        $riskAssessment = RiskAssessment::findOrFail($id);
        $riskAssessment->delete();
        return redirect()->route('risk_assessments.index')->with('success', 'Risk Assessment deleted successfully.');
    }

    public function edit($id)
{
    // Load the existing risk assessment
    $riskAssessment = RiskAssessment::with('threatGroup', 'threat', 'vulnerabilityGroup', 'vulnerability')
        ->findOrFail($id);

    // Load all assets, threat groups, and vulnerability groups
    $assets = AssetRegister::all();
    $threatGroups = ThreatGroup::with('threats')->get();  // Load threat groups with threats
    $vulnerabilityGroups = VulnerabilityGroup::with('vulnerabilities')->get();  // Load vulnerability groups with vulnerabilities

    return view('risk_assessments.edit', compact('riskAssessment', 'assets', 'threatGroups', 'vulnerabilityGroups'));
}


    public function getThreatsByGroup($groupId)
    {
        $threats = Threat::where('threat_group_id', $groupId)->get();
        return view('partials.threats', compact('threats'));
    }
    
    public function getVulnerabilitiesByGroup($groupId)
    {
        $vulnerabilities = Vulnerability::where('vulnerability_group_id', $groupId)->get();
        return view('partials.vulnerabilities', compact('vulnerabilities'));
    }
}
