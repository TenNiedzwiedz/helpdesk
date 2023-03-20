@extends('layouts/dashboard')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Użytkownicy</h1>

<div class="card shadow mb-4">
    <div class="card-header bg-primary py-3">
        <h6 class="m-0 font-weight-bold text-gray-100">Lista użytkowników</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Imię i nazwisko</th>
                <th scope="col">Email</th>
                <th scope="col">Typ konta</th>
                <th scope="col">Data dodania</th>
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="{{ url('/users')}}/{{ $user->id}}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection