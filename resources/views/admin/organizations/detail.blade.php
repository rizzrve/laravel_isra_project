<div class="modal fade my-5" id="view-org-{{ $org->org_id }}" tabindex="-1" aria-hidden="true"
    aria-labelledby="orgModalLabel{{ $org->org_id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{-- modal header --}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="view-project">Organization Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                {{-- prj desc --}}
                <div class="container">
                    <div class="container">
                        <div class="container">
                            <form id="update-project" action="{{ route('test.organizations.update', $org->org_id) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="col-12 my-3">
                                    <label class="form-label fw-bold" for="org_id{{ $org->org_id }}">
                                        ID:
                                    </label>
                                    <input class="form-control" type="text" id="org_id{{ $org->org_id }}"
                                        placeholder="{{ $org->org_id }}" disabled readonly>
                                </div>

                                <div class="col-12 my-3">
                                    <label class="form-label fw-bold">
                                        Name:
                                    </label>
                                    <input class="form-control" type="text" id="org_name" name="org_name"
                                        placeholder="{{ $org->org_name }}">
                                </div>

                                <div class="mb-3 my-3">
                                    <label class="form-label fw-bold">
                                        Logo:
                                    </label>
                                    @if ($org->org_logo)
                                        <img src="{{ asset('/storage/logos/' . $org->org_logo) }}"
                                            alt="Logo" width="100">
                                    @else
                                        No Logo
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    {{-- <button data-bs-target="#save-project-modal" data-bs-toggle="modal" class="btn btn-primary">Save</button> --}}
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('update-project').addEventListener('submit', function(event) {
        console.log('Form is being submitted');
    });
</script>
