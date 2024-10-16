<div class="modal-content">

    <div class="modal-header">
        <h1 class="modal-title fs-5">Edit Vulnerability Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body text-center">

        <div class="input-group mt-3">
            <span class="input-group-text">Vulnerability ID</span>
            <input type="text" class="form-control" value="{{ $vuln->id }}" disabled>
        </div>

        <form id="form-edit-vuln" action="{{ route('vulnerabilities.update', $vuln->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group mt-3">
                <span class="input-group-text" id="name">Name</span>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="{{ $vuln->name }}" value="{{ $vuln->name }}">
            </div>

            <div class="input-group mt-3">
                <span class="input-group-text" id="description">Description</span>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="{{ $vuln->description }}"
                    required></textarea>
            </div>

            <div class="input-group mt-3">
                <span class="input-group-text" id="vuln-group-id">Group</span>
                <select class="form-select" id="vulnerability_group_id" name="vulnerability_group_id" required>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}"
                            {{ $group->id == $vuln->vulnerability_group_id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>

        </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="form-edit-vuln">Save</button>
    </div>

</div>

<script>
    document.getElementById('form-edit-vuln').addEventListener('submit', function(event) {
        console.log('Form is being submitted');
    });
</script>
