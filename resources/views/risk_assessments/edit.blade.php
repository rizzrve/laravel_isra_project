@extends('base.layout')

@section('content')

@include('navbar.layout')

<div class="container">
    <h1>Edit Risk Assessment</h1>

    <form action="{{ route('risk_assessments.update', $riskAssessment->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="asset_id">Asset</label>
            <select name="asset_id" id="asset_id" class="form-control" required>
                @foreach($assets as $asset)
                    <option value="{{ $asset->asset_id }}" {{ $riskAssessment->asset_id == $asset->asset_id ? 'selected' : '' }}>{{ $asset->asset_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="threat_group_id">Threat Group</label>
            <select name="threat_group_id" id="threat_group_id" class="form-control" required>
                @foreach($threatGroups as $group)
                    <option value="{{ $group->id }}" {{ $riskAssessment->threat_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="threat_id">Threat</label>
            <select name="threat_id" id="threat_id" class="form-control" required>
                <option value="">Select Threat</option>
                <!-- JavaScript will populate this based on the selected group -->
            </select>
        </div>

        <div class="form-group">
            <label for="vulnerability_group_id">Vulnerability Group</label>
            <select name="vulnerability_group_id" id="vulnerability_group_id" class="form-control" required>
                @foreach($vulnerabilityGroups as $group)
                    <option value="{{ $group->id }}" {{ $riskAssessment->vulnerability_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="vulnerability_id">Vulnerability</label>
            <select name="vulnerability_id" id="vulnerability_id" class="form-control" required>
                <option value="">Select Vulnerability</option>
                <!-- JavaScript will populate this based on the selected group -->
            </select>
        </div>

        <div class="form-group">
            <label for="confidentiality">Confidentiality</label>
            <input type="number" name="confidentiality" class="form-control" value="{{ $riskAssessment->confidentiality }}" required>
        </div>

        <div class="form-group">
            <label for="integrity">Integrity</label>
            <input type="number" name="integrity" class="form-control" value="{{ $riskAssessment->integrity }}" required>
        </div>

        <div class="form-group">
            <label for="availability">Availability</label>
            <input type="number" name="availability" class="form-control" value="{{ $riskAssessment->availability }}" required>
        </div>

        <div class="form-group">
            <label for="personnel">Personnel</label>
            <input type="text" name="personnel" class="form-control" value="{{ $riskAssessment->personnel }}" required>
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" value="{{ $riskAssessment->start_time }}" required>
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" value="{{ $riskAssessment->end_time }}">
        </div>

        <div class="form-group">
            <label for="likelihood">Likelihood</label>
            <select name="likelihood" class="form-control" required>
                <option value="Low" {{ $riskAssessment->likelihood == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $riskAssessment->likelihood == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $riskAssessment->likelihood == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="impact">Impact</label>
            <select name="impact" class="form-control" required>
                <option value="Low" {{ $riskAssessment->impact == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $riskAssessment->impact == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $riskAssessment->impact == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="risk_level">Risk Level</label>
            <select name="risk_level" class="form-control" required>
                <option value="Low" {{ $riskAssessment->risk_level == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $riskAssessment->risk_level == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $riskAssessment->risk_level == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="risk_owner">Risk Owner</label>
            <input type="text" name="risk_owner" class="form-control" value="{{ $riskAssessment->risk_owner }}" required>
        </div>

        <div class="form-group">
            <label for="mitigation_option">Mitigation Option</label>
            <textarea name="mitigation_option" class="form-control" required>{{ $riskAssessment->mitigation_option }}</textarea>
        </div>

        <div class="form-group">
            <label for="treatment">Treatment</label>
            <textarea name="treatment" class="form-control">{{ $riskAssessment->treatment }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Risk Assessment</button>
    </form>
</div>

<script>
// JavaScript to populate threats and vulnerabilities based on selected groups
document.getElementById('threat_group_id').addEventListener('change', function() {
    const groupId = this.value;
    fetch(`/api/threats/group/${groupId}`)
        .then(response => response.json())
        .then(data => {
            const threatSelect = document.getElementById('threat_id');
            threatSelect.innerHTML = '';
            data.forEach(threat => {
                const option = document.createElement('option');
                option.value = threat.id;
                option.textContent = threat.name;
                threatSelect.appendChild(option);
            });
        });
});

document.getElementById('vulnerability_group_id').addEventListener('change', function() {
    const groupId = this.value;
    fetch(`/api/vulnerabilities/group/${groupId}`)
        .then(response => response.json())
        .then(data => {
            const vulnerabilitySelect = document.getElementById('vulnerability_id');
            vulnerabilitySelect.innerHTML = '';
            data.forEach(vulnerability => {
                const option = document.createElement('option');
                option.value = vulnerability.id;
                option.textContent = vulnerability.name;
                vulnerabilitySelect.appendChild(option);
            });
        });
});
</script>

@endsection
