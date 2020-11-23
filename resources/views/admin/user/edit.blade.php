@extends('layouts.app')

@section('title', 'Edit '. $user->first_name)

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail User</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $user->first_name }}'s info</h4>
                        </div>
                        <div class="card-body">
                            @include('partials.error_alert')
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" autocomplete="name" name="first_name" id="first_name" class="form-control" value="{{ old('fist_name', $user->first_name) }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role_id" id="role" class="form-control">
                                        @foreach ($roles as $id => $role)
                                            <option value="{{$id}}" {{$role === $user->role ? 'selected' : ''}}>{{$role}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="submit" class="btn btn-md btn-primary" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-warning"></i> Options</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete Account">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if (!empty($user->store))
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $user->first_name }}'s store</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="store_name">Name</label>
                                    <input type="text" class="form-control" value="{{ $user->store->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="store_name">Slug</label>
                                    <input type="text" class="form-control" value="{{ $user->store->name }}">
                                </div>
                                <img src="{{ $user->store->image }}" alt="{{ $user->store->name }}'s image">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection
