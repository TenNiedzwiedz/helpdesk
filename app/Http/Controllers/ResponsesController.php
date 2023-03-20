<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponsesController extends Controller
{
    public function store(Request $request) {
        //dd($request);
        $response = Response::create([
            'submission_id' => $request->submission_id,
            'type' => $request->type,
            'content' => $request->content ?? '',
            'author_id' => Auth::id(),
            'assigned_id' => $request->assigned_id ?? null,
        ]);

        return redirect('submissions/'.$request->submission_id);
    }
}
