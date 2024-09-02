<div class="modal fade my-5" id="view-project-{{ $prj->projectID }}" tabindex="-1" aria-hidden="true"
    aria-labelledby="projectModalLabel{{ $prj->projectID }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{-- modal header --}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="view-project">Project Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                {{-- top btn --}}
                <div class="container text-center my-5">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary">Risk Register</button>
                        <button type="button" class="btn btn-primary">Risk Assessment</button>
                        <button type="button" class="btn btn-primary">Risk Treatment Plan</button>
                    </div>
                </div>

                {{-- prj desc --}}
                <div class="container">
                    <div class="container my-3">
                        <div class="container my-5">
                            <form>
                                <div class="col-12 my-3">
                                    <label for="projectID{{ $prj->projectID }}" class="form-label fw-bold">ID: </label>
                                    <input type="text" class="form-control" id="projectID{{ $prj->projectID }}"
                                        placeholder="{{ $prj->projectID }}" disabled readonly>
                                </div>
                                <div class="col-12 my-3">
                                    <label for="projectTitle{{ $prj->projectID }}" class="form-label fw-bold">Title:
                                    </label>
                                    <input type="text" class="form-control" id="projectTitle{{ $prj->projectID }}"
                                        placeholder="{{ $prj->projectTitle }}">
                                </div>
                                <div class="mb-3 my-3">
                                    <label for="projectDescription{{ $prj->projectID }}"
                                        class="form-label fw-bold">Description: </label>
                                    <textarea class="form-control" id="projectDescription{{ $prj->projectID }}" rows="3"
                                        placeholder="{{ $prj->projectDescription }}"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
