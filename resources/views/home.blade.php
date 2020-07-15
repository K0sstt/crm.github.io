@extends('layouts.app')

@section('content')
<div class="">

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

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company</th>
            <th scope="col">site</th>
            <th scope="col">linkedin</th>
            <th scope="col">business_area</th>
            <th scope="col">product</th>
            <th scope="col">country</th>
            <th scope="col">revenue</th>
            <th scope="col">amount_workers</th>
            <th scope="col">years</th>
            <th scope="col">comment</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <th scope="row">{{ $company->id }}</th>
                <td><a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a></td>
                <td>{{ $company->site }}</td>
                <td>{{ $company->linkedin }}</td>
                <td>{{ $company->business_area }}</td>
                <td>{{ $company->product }}</td>
                <td>{{ $company->country }}</td>
                <td>{{ $company->revenue }}</td>
                <td>{{ $company->amount_workers }}</td>
                <td>{{ $company->years }}</td>
                <td>{{ $company->comment }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
