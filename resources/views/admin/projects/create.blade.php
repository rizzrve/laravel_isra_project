<div class="modal fade my-5" id="create-org" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create-org">Create Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('test.organizations.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="org_name" class="form-label fs-6">Title: </label>
                        <input class="form-control" type="text" id="org_name" name="org_name">
                    </div>
                    <div class="mb-3">
                        <label for="org_desc" class="form-label fs-6">Description: </label>
                        <textarea class="form-control" type="text" id="org_desc" name="org_desc" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
