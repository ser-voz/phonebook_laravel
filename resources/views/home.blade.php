@extends('layout')

@section('content')
    @if(count($users))
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td class="text-center" ><a href="/change/{{ $user->id }}">Изменить</a></td>
                        <td class="text-center" ><a href="/delete/{{ $user->id }}">Удалить</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- ./table-responsive-->

        {{ $users->appends(['s' => request()->s])->links('pagination::bootstrap-4') }}
    @else
        <p>Записей не найдено...</p>
    @endif
@endsection

@section('form')
    @if(isset($userChange))
        <form method="post" action="{{ route('update') }}">
            @method('PUT')
            @csrf
            <div class="form-row">
                <input type="hidden" name="id" value="{{ $userChange->id }}">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" value="{{ $userChange->name }}" name="name" placeholder="Name">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" value="{{ $userChange->email }}" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" value="{{ $userChange->phone }}" name="phone" placeholder="Phone">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Edit</button>
                </div>
            </div>
        </form>
    @else
        <form method="post" action="{{ route('create') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </div>
            </div>
        </form>
    @endif
@endsection
