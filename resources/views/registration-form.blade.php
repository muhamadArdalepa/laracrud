@extends('base')
@section('main')

<div class="row">
    <div class="col-md-8 col-xl-6">
        <h1>Student Registration</h1>
        <hr>
        <form action="{{ route('students.store') }}" method="POST" autocomplete="on">
            @csrf
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim') }}"
                    class="form-control @error('nim') is-invalid @enderror">
                @error('nim')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input type="radio" name="gender" id="male" value="M" class="form-check-input" {{
                            old('gender')=='M' ?'checked':'' }}>
                        <label for="male" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check me-3">
                        <input type="radio" name="gender" id="female" value="F" class="form-check-input" {{
                            old('gender')=='F' ?'checked':'' }}>
                        <label for="female" class="form-check-label">Female</label>
                    </div>
                </div>
                @error('gender')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="major" class="form-label">Major</label>
                <select name="major" id="major" class="form-select">
                    <option value="Informatics Engineering" {{ old('major')=='Informatics Engineering' ?'selected':''
                        }}>
                        Informatics Engineering
                    </option>
                    <option value="Informatics System" {{ old('major')=='Informatics System' ?'selected':'' }}>
                        Informatics System
                    </option>
                    <option value="Computer Science" {{ old('major')=='Computer Science' ?'selected':'' }}>
                        Computer Science
                    </option>
                    <option value="Computer Engineering" {{ old('major')=='Computer Engineering' ?'selected':'' }}>
                        Computer Engineering
                    </option>
                    <option value="Telecommunications Engineering" {{ old('major')=='Telecommunications Engineering'
                        ?'selected':'' }}>
                        Telecommunications Engineering
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" rows="3" name="address"
                    class="form-control">{{old('address')}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
        </form>
    </div>
</div>

@endsection