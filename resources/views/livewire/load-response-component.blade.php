<div class="card shadow mb-4">
    <div class="card-header bg-primary py-3">
        <select class="form-control form-select" wire:model="selectedResponseType">
            <option value="public-response">Dodaj odpowiedź</option>
            <option value="private-response">Dodaj notatkę</option>
        </select>
    </div>
    <div class="card-body">
        @if ($component)
            {!! $component !!}
        @endif
    </div>
</div>