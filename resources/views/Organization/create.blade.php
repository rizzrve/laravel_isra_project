

<div class="modal fade my-5" id="organizationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="organizationModal">Create Organizaiton</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <form action="{{ route('organizations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="org_name">Organization Name </label>
                        <input type="text" name="org_name" id="org_name" required>
                    </div>
                    <div>
                        <label for="org_logo">Logo:</label>
                        <input type="file" name="org_logo" id="org_logo">
                    </div>
                    <button type="submit">Add</button>
                    <button type="button" data-bs-dismiss="modal">Close</button>
                </form>
                
            </div>
        </div>
    </div>
</div>


{{-- 
<!-- Modal -->
<div class="model-body">
    <form action="{{ route('organizations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="logo">Logo:</label>
            <input type="file" name="logo" id="logo">
        </div>
        <button type="submit">Add</button>
        <button type="button" onclick="closeModal()">Close</button>
    </form>
</div> --}}