<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponseRequest;
use App\Models\Response;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResponsesController extends Controller
{
    /**
     * Store a newly created response in storage.
     *
     * @param  \App\Http\Requests\StoreResponseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResponseRequest $request)
    {
        // Retrieve validated data from the request
        $validated = $request->validated();

        // Create a new response with the given data
        $response = Response::create([
            'submission_id' => $validated['submission_id'],
            'type' => $validated['type'],
            'content' => $validated['content'] ?? '',
            'author_id' => $validated['author_id'],
            'assigned_id' => $validated['assigned_id'] ?? null,
        ]);

        // Update submission status if the response type is 3
        switch ($validated['type']) {
            case 3:
                $submission = Submission::findOrFail($validated['submission_id']);
                $submission->status = 3;
                $submission->save();
                break;
        }

        // Redirect the user to the submission view page
        return redirect('submissions/'.$validated['submission_id']);
    }

}
