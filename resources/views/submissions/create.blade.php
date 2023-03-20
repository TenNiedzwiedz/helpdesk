@extends('layouts/dashboard')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dodaj nowe zgłoszenie</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/submissions" class="form-group">
                @csrf
                <div class="form-group">
                    <label for="title">Temat</label>
                    <input name="title"
                        type="text"
                        value="{{ old('titletitle') }}"
                        class="form-control form-control-user @error('title') is-invalid @enderror">
                    
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Treść</label>
                    <textarea name="content"
                        type="text"
                        class="form-control form-control-user @error('title') is-invalid @enderror">{{ old('titletitle') }}</textarea>
                    
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Dodaj zgłoszenie</span>
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection