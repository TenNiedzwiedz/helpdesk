<div class="mr-2">
    @switch($submission->status)
        @case(1)
            <span class="badge bg-primary text-white">Otwarte</span>
            @break
        @case(2)
            <span class="badge bg-success text-white">Zamknięte</span>
            @break
        @case(3)
            <span class="badge bg-danger text-white">Błędne</span>
            @break
    @endswitch
</div>