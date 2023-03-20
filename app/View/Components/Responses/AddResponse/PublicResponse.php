<?php

namespace App\View\Components\Responses\AddResponse;

use App\Models\Submission;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PublicResponse extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Submission $submission)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.responses.add-response.public-response');
    }
}
