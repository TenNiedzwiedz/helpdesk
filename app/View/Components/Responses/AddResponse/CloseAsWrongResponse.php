<?php

namespace App\View\Components\Responses\AddResponse;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CloseAsWrongResponse extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.responses.add-response.close-as-wrong-response');
    }
}
