@extends('layouts/dashboard')

@section('content')
<div class="mb-4 d-flex align-items-center">
<x-submissions.status :submission=$submission></x-submissions-status>
<h3 class="mb-0 font-weight-bold text-primary">{{ $submission->title }}</h3>
</div>

<div class="">
    <div class="row">
        <div class="col-9">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-gray-100">Treść zgłoszenia</h6>
                </div>
                <div class="card-body">
                    {{ $submission->content }}
                </div>
            </div>
            @foreach($submission->responses as $response)
                @switch($response->type)
                    @case(1)
                        <x-responses.view-response.public-response :response="$response"/>
                        @break
                    @case(2)
                        <x-responses.view-response.private-response :response="$response"/>
                        @break
                    @case(3)
                        <x-responses.view-response.close-as-wrong-response :response="$response"/>
                        @break
                @endswitch
            @endforeach
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-gray-100">Informacje</h6>
                </div>
                <div class="card-body">
                    Data zgłoszenia: {{ $submission->created_at->format('Y-m-d')}}</br>
                    Autor: {{ $submission->author->name }} </br>
                    Przypisany: {{ $submission->assignedUser->name ?? 'brak'}}
                </div>
            </div>
        </div>
    </div>
</div>

<livewire:load-response-component :submission="$submission">

@endsection