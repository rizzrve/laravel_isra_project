<div class="modal fade my-5" id="create-org" tabindex="-1" aria-hidden="true">
    <form action="{{ route('test.organizations.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="create-org">Add Organization</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="org_name" class="form-label fs-6">Title: </label>
                        <input class="form-control" type="text" id="org_name" name="org_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="org_logo" class="form-label">Logo: </label>
                        <input class="form-control" type="file" id="org_logo" name="org_logo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
