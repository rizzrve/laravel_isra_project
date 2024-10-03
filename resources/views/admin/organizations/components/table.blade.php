<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Organization ID</th>
            <th scope="col">Organization Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($organizations as $org)
            <tr>
                <td>{{ $org->org_id }}</td>
                <td>{{ $org->org_name }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#view-org-{{ $org->org_id }}">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>
            @include('admin.organizations.components.detail')
        @endforeach
    </tbody>
</table>
