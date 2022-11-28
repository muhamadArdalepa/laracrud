@extends('base')
@include('navbar')
@section('main')

<div class="row mt-3">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-3">Students Table</h1>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
        </div>
        <form action="{{ route('students.index') }}" class="mb-3">
            <div class="input-group">
                <label class="input-group-text" for="filter">Filter by</label>
                <select class="form-select" id="filter" name="filter" style="flex: 2 0 auto">
                    <option value="" {{ request('filter')?request('filter')=='' ?'selected':'':'' }}>All
                    </option>
                    <option value="nim" {{ request('filter')?request('filter')=='nim' ?'selected':'':'' }}>NIM
                    </option>
                    <option value="name" {{ request('filter')?request('filter')=='name' ?'selected':'':'' }}>
                        Name</option>
                    <option value="major" {{ request('filter')?request('filter')=='major' ?'selected':'':'' }}>
                        Major</option>
                    <option value="address" {{ request('filter')?request('filter')=='address' ?'selected':'':'' }}>
                        Address</option>
                </select>
                <label class="input-group-text" for="sort">Sort by</label>
                <select class="form-select" id="sort" name="sort" style="flex: 2 0 auto">
                    <option value="created_at" {{ request('sort')?request('sort')=='created_at' ?'selected':'':'' }}>
                        Created
                    </option>
                    <option value="updated_at" {{ request('sort')?request('sort')=='updated_at' ?'selected':'':'' }}>
                        Updated
                    </option>
                    <option value="nim" {{ request('sort')?request('sort')=='nim' ?'selected':'':'' }}>
                        NIM
                    </option>
                    <option value="name" {{ request('sort')?request('sort')=='name' ?'selected':'':'' }}>
                        Name
                    </option>
                    <option value="major" {{ request('sort')?request('sort')=='major' ?'selected':'':'' }}>
                        Major
                    </option>
                    <option value="address" {{ request('sort')?request('sort')=='address' ?'selected':'':'' }}>
                        Address
                    </option>
                </select>
                <select class="form-select" id="sc" name="sc" style="flex: 1 0 auto">
                    <option value="desc" {{ request('sc')?request('sc')=='desc' ?'selected':'':'' }}>
                        DESC
                    </option>
                    <option value="asc" {{ request('sc')?request('sc')=='asc' ?'selected':'':'' }}>
                        ASC
                    </option>
                </select>
                <input type="search" class="form-control" placeholder="Search. . . " name="search"
                    value="{{ request('search') }}" style="flex: 20 0 auto">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        @if (request('search'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Found <b>{{ $row }}</b> record
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Major</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender =='M'?'Male':'Female' }}</td>
                    <td>{{ $student->major }}</td>
                    <td>{{ $student->address == '' ? 'N/A':$student->address }}</td>
                    <td class="align-middle">
                        <div class="d-flex flex-nowrap gap-2 align-content-center">
                            <a href="{{ url('/students/'.$student->id) }}" type="submit" class="btn btn-info btn-sm"
                                role="button">Detail</a>
                            <a href="{{ url('/students/'.$student->id.'/edit') }}" type="submit"
                                class="btn btn-warning btn-sm" role="button">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" vId="{{ $student->id }}"
                                vName="{{ $student->name }}">Delete
                            </button>

                        </div>
                    </td>
                </tr>

                @empty
                <td colspan="7" class="text-center">Empty</td>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $students->links() }}
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete
                    {{ $student->name }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this data?
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="form-delete" action="" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-delete').forEach(item => {
        item.addEventListener('click', event => {
            document.querySelector('.modal-title').innerHTML = 'Delete ' + item.getAttribute('vName') + " ?"
            document.querySelector('#form-delete').setAttribute('action','/students/'+item.getAttribute('vId'))
        })
    })
</script>
@endsection