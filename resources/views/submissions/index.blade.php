@extends('layouts/dashboard')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Zgłoszenia</h1>

<div class="card shadow mb-4">
    <div class="card-header bg-primary py-3">
        <h6 class="m-0 font-weight-bold text-gray-100">Lista zgłoszeń</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Autor</th>
                <th scope="col">Temat</th>
                <th scope="col">Przypisany</th>
                <th scope="col">Data dodania</th>
              </tr>
            </thead>
            <tbody>
                @foreach($submissions as $submission)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $submission->author->name }}</td>
                    <td><div class="d-flex align-items-center"><x-submissions.status :submission="$submission"></x-submissions.status><a href="{{ url('/submissions')}}/{{ $submission->id}}">{{ $submission->title }}</a></div></td>
                    <td>{{ $submission->assignedUser->name ?? 'brak' }}</td>
                    <td>{{ $submission->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection