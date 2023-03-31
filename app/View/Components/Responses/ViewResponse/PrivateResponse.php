<?php

namespace App\View\Components\Responses\ViewResponse;

use App\Models\Response;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrivateResponse extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Response $response)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.responses.view-response.private-response');
    }
}
