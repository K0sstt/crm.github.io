@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('companies.search') }}" method="post">
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

        <ul class="list-group">
            @foreach($result as $item)
                <li class="list-group-item">{{ $item->name ?? $item->full_name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
