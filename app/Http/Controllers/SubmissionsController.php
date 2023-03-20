<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionsController extends Controller
{
    public function viewAll() {
        $submissions = Submission::all();

        return view('submissions.index', compact('submissions'));
    }

    public function view(int $id) {
        $submission = Submission::findOrFail($id);

        return view('submissions.single', compact('submission'));
    }

    public function create() {
        return view('submissions.create');
    }

    public function store(Request $request) {
        $submission = Submission::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => Auth::id(),
            'status' => 1,
        ]);

        return redirect('submissions')->with('success', 'Zgłoszenie zostało dodane');
    }
}
