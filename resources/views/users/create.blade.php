@extends('layouts/dashboard')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dodaj nowego użytkownika</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/users" class="form-group">
                @csrf
                <div class="form-group">
                    <label for="name">Typ konta</label>
                    <select name="role_id"
                        class="form-control form-select @error('name') is-invalid @enderror">
                            <option hidden>Wybierz typ użytkownika</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Imię i nazwisko</label>
                    <input name="name"
                        type="text"
                        value="{{ old('name') }}"
                        class="form-control form-control-user @error('name') is-invalid @enderror">
                    
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email"
                        type="email"
                        value="{{ old('email') }}"
                        class="form-control form-control-user @error('email') is-invalid @enderror">
                    
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Hasło</label>
                    <input name="password"
                        type="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror">
                    
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Powtórz hasło</label>
                    <input name="password_confirmation"
                        type="password"
                        class="form-control form-control-user">
                </div>

                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Dodaj użytkownika</span>
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection