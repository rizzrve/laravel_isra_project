<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="create-threat-group">Create Threat or Group</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <div class="d-flex justify-content-center align-items-center">
            <div class="container text-center">
                <div class="btn-group" role="group">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-group-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-group" type="button" role="tab" aria-controls="nav-group"
                                aria-selected="true">
                                Create Group
                            </button>
                            <button class="nav-link" id="nav-threat-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-threat" type="button" role="tab" aria-controls="nav-threat"
                                aria-selected="false">
                                Create Threat
                            </button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center my-3">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-group" role="tabpanel" aria-labelledby="nav-group-tab"
                    tabindex="0">
                    <form action="{{ route('threat-groups.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Group Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-threat" role="tabpanel" aria-labelledby="nav-threat-tab"
                    tabindex="0">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</div>
