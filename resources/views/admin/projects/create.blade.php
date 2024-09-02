<div class="modal fade my-5" id="create-project" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create-project">Create Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.projects.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="projectTitle" class="form-label fs-6">Title: </label>
                        <input class="form-control" type="text" id="projectTitle" name="projectTitle">
                    </div>
                    <div class="mb-3">
                        <label for="projectDescription" class="form-label fs-6">Description: </label>
                        <textarea class="form-control" type="text" id="projectDescription" name="projectDescription" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>