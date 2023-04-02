<div class="card shadow mb-4 border-left-danger">
    <div class="d-flex justify-content-between align-items-center card-header bg-gray-200 py-3">
        <h6 class="m-0">Użytkownik <strong>{{ $response->author->name }}</strong> zamknął zgłoszenie jako błędne:</h6>
        <div>
            <small class="mr-2">{{ $response->created_at->format("Y-m-d H:m:s") }}</small>
        </div>
    </div>
    <div class="card-body">
        {{ $response->content }}
    </div>
</div>