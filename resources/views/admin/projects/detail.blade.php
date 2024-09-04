<div class="modal fade my-5" id="view-project-{{ $prj->prj_id }}" tabindex="-1" aria-hidden="true"
    aria-labelledby="projectModalLabel{{ $prj->prj_id }}">
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
                        <button type="button"
                            class="btn btn-primary btn-color btn-bg-color btn-sm col-xs-2 margin-left me-2">Risk
                            Register</button>
                        <button type="button"
                            class="btn btn-primary btn-color btn-bg-color btn-sm col-xs-2 margin-left me-2">Risk
                            Assessment</button>
                        <button type="button"
                            class="btn btn-primary btn-color btn-bg-color btn-sm col-xs-2 margin-left me-2">Risk
                            Treatment Plan</button>
                    </div>
                </div>

                {{-- prj desc --}}
                <div class="container">
                    <div class="container">
                        <div class="container">
                            <form id="update-project" action="{{ route('admin.projects.update', $prj->prj_id) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="col-12 my-3">
                                    <label class="form-label fw-bold" for="prj_id{{ $prj->prj_id }}">
                                        ID:
                                    </label>
                                    <input class="form-control" type="text" id="prj_id{{ $prj->prj_id }}"
                                        placeholder="{{ $prj->prj_id }}" disabled readonly>
                                </div>

                                <div class="col-12 my-3">
                                    <label class="form-label fw-bold">
                                        Title:
                                    </label>
                                    <input class="form-control" type="text" id="prj_name" name="prj_name"
                                        placeholder="{{ $prj->prj_name }}">
                                </div>

                                <div class="mb-3 my-3">
                                    <label class="form-label fw-bold">
                                        Description:
                                    </label>
                                    <textarea class="form-control" id="prj_desc" rows="3" name="prj_desc" placeholder="{{ $prj->prj_desc }}"></textarea>
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
