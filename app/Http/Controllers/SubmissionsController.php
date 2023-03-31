<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionsController extends Controller
{
    /**
     * Displays a list of all submissions.
     *
     * @return \Illuminate\View\View
     *         A view instance that displays the list of all submissions.
     */
    public function viewAll()
    {
        // Retrieve all submissions from the database.
        $submissions = Submission::all();

        // Render the submissions index view with the submissions data.
        return view('submissions.index', compact('submissions'));
    }

    /**
     * Displays a single submission by its ID.
     *
     * @param  int  $id
     *         The ID of the submission to display.
     *
     * @return \Illuminate\View\View
     *         A view instance that displays the single submission.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *         If no submission with the given ID is found.
     */
    public function view(int $id)
    {
        // Retrieve the submission with the given ID from the database.
        $submission = Submission::findOrFail($id);

        // Render the submission view with the submission data.
        return view('submissions.single', compact('submission'));
    }

    /**
     * Displays the submission creation form.
     *
     * @return \Illuminate\View\View
     *         A view instance that displays the submission creation form.
     */
    public function create()
    {
        // Render the submission creation view.
        return view('submissions.create');
    }

    /**
     * Stores a new submission in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     *         The HTTP request object containing the submission data.
     *
     * @return \Illuminate\Http\RedirectResponse
     *         A redirect response to the submissions index page with a success message.
     *
     * @throws \Illuminate\Validation\ValidationException
     *         If the validation rules fail.
     */
    public function store(Request $request)
    {
        // Validate the submission data.
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        try {
            // Create a new submission in the database with the validated data.
            $submission = Submission::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'author_id' => Auth::id(),
                'status' => 1,
            ]);

            // Redirect to the submissions index page with a success message.
            return redirect('submissions')->with('success', 'Zgłoszenie zostało dodane');
        } catch (\Exception $e) {
            // Log the exception for debugging purposes.
            //\Log::error($e->getMessage()); //TODO

            // Redirect back to the submission creation form with an error message.
            return redirect()->back()->withErrors([
                'error' => 'Wystąpił błąd podczas zapisywania zgłoszenia. Prosimy spróbować ponownie.',
            ]);
        }
    }

}
