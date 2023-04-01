<div>
    <form method="POST" action="/response/2/{{ $submission->id }}" class="form-group">
        @csrf
        <div class="form-group">
            <label for="content">Treść</label>
            <textarea name="content"
                type="text"
                class="form-control form-control-user @error('title') is-invalid @enderror">{{ old('content') }}</textarea>
            
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Dodaj notatkę</span>
            </a>
        </div>
    </form>
</div>