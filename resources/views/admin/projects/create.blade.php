@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group py-2">
                                <label class="fw-semibold fs-5" for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group py-2">
                                <label class="fw-semibold fs-5" for="stack">Stack</label>
                                <input type="text" class="form-control @error('stack') is-invalid @enderror" id="stack"
                                    name="stack" value="{{ old('stack') }}">
                                @error('stack')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group py-2">
                                <label class="fw-semibold fs-5" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group py-2">
                                        <label class="fw-semibold fs-5" for="start_date">Start Date</label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                                            name="start_date" value="{{ old('start_date') }}">
                                        @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group py-2">
                                        <label class="fw-semibold fs-5" for="end_date">End Date</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                                            name="end_date" value="{{ old('end_date') }}">
                                        @error('end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group py-2">
                                        <label class="fw-semibold fs-5" for="status">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                                                {{ old('status') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status">
                                                Compleated
                                            </label>
                                        </div>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="fw-semibold fs-5" for="technologies">Select technologies</label>
                            <div class="form-group d-flex flex-wrap">
                                @foreach ($technologies as $tech)
                                    <div class="form-check mx-2">
                                        <input type="checkbox" name="technolgies[]" 
                                        id="" class="form-check-input"value="{{ $tech->id }}" 
                                        {{ is_array(old('technologies')) && in_array($tech->id), old('technologies') ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $tech->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="fw-semibold fs-5" for="image_path">Image</label>
                                <input type="file" class="form-control @error('end_date') is-invalid @enderror" 
                                    name="image_path" id="image_path">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="fw-semibold fs-5" for="type_id">Project Type</label>
                                <select name="type_id" id="type_id" class="form-select">
                                    <option value="">-- Select a type --</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" @selected($type->id == old('type_id'))>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </form>
            </div>
        </div>
    </div>
@endsection
