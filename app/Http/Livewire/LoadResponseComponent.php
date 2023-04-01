<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\View; // Import View facade
use Livewire\Component;

class LoadResponseComponent extends Component
{
    public $submission;
    public $selectedResponseType = 'public-response';

    public function mount($submission)
    {
        $this->submission = $submission;
    }

    /**
     * Returns the rendered component view, or null if the selected view doesn't exist.
     *
     * @return \Illuminate\Contracts\View\View|null
     */
    public function getComponentProperty()
    {
        $view = 'components.responses.add-response.' . $this->selectedResponseType;

        // Check whether the selected view exists
        if (View::exists($view)) {
            return view($view, ['submission' => $this->submission]);
        }

        // If the view doesn't exist, return null
        return null;
    }

    public function render()
    {
        return view('livewire.load-response-component', [
            'component' => $this->getComponentProperty(),
        ]);
    }
}
