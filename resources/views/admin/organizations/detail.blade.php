<div class="modal fade my-5" id="view-org-{{ $org->org_id }}" tabindex="-1" aria-hidden="true"
    aria-labelledby="orgModalLabel{{ $org->org_id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{-- modal header --}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="view-project">Edit Organization Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                {{-- prj desc --}}
                <div class="container">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <form id="update-org" action="{{ route('test.organizations.update', $org->org_id) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')

                                @if ($org->org_logo)
                                    <div class="image-container">
                                        <img class="rounded-circle" src="{{ asset($org->org_logo) }}"
                                            alt="Organization Logo" width="100" id="logoImage">
                                        <div class="overlay">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </div>
                                        <input type="file" class="file-input" id="fileInput" accept="image/*"
                                            onchange="uploadLogo(event)">
                                    </div>
                                @else
                                    <p>No logo uploaded</p>
                                @endif
                        </div>

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

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .image-container img {
        transition: opacity 0.3s ease;
    }

    .image-container:hover img {
        opacity: 0.5;
    }

    .image-container .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .image-container:hover .overlay {
        opacity: 1;
    }

    .image-container .overlay i {
        font-size: 24px;
        color: white;
    }

    .file-input {
        display: none;
    }
</style>


<script>
    document.querySelector('.image-container').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    function uploadLogo(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logoImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
