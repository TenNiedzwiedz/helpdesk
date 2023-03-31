<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponsesController extends Controller
{
    /**
     * Stores a new response for a submission.
     *
     * @param  \Illuminate\Http\Request  $request
     *         The HTTP request instance containing the response data.
     *
     * @return \Illuminate\Http\RedirectResponse
     *         A redirect response to the submission view page.
     */
    public function store(Request $request)
    {
        // Create a new response with the given data.
        $response = Response::create([
            'submission_id' => $request->submission_id,
            'type' => $request->type,
            'content' => $request->content ?? '',
            'author_id' => Auth::id(),
            'assigned_id' => $request->assigned_id ?? null,
        ]);

        // Redirect the user to the submission view page.
        return redirect('submissions/'.$request->submission_id);
    }

}
