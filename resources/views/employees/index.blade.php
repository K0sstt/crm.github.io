@extends('layouts.app')

@section('content')
    <div class="">

        <form action="{{ route('employees.search') }}" method="post">
            @csrf
            <div class="input-group my-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search..."
                    aria-label="Search..."
                    aria-describedby="search"
                    name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="search">Search</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">company</th>
                <th scope="col">position</th>
                <th scope="col">email</th>
                <th scope="col">linkedin</th>
                <th scope="col">status</th>
                <th scope="col">comment</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td><a href="{{ route('employees.show', $employee) }}">{{ $employee->full_name }}</a></td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->linkedin }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>{{ $employee->comment }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
