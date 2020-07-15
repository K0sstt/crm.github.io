@extends('layouts.app')

@section('content')

<div class="container">
    <form method="post" action="{{ route('companies.update', $company) }}">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">name</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="{{ $company->name ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="site" class="col-sm-2 col-form-label">site</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="site"
                    name="site"
                    value="{{ $company->site ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="linkedin" class="col-sm-2 col-form-label">linkedin</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="linkedin"
                    name="linkedin"
                    value="{{ $company->linkedin ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="business_area" class="col-sm-2 col-form-label">business_area</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="business_area"
                    name="business_area"
                    value="{{ $company->business_area ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-sm-2 col-form-label">country</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="country"
                    name="country"
                    value="{{ $company->country ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="revenue" class="col-sm-2 col-form-label">revenue</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="revenue"
                    name="revenue"
                    value="{{ $company->revenue ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="amount_workers" class="col-sm-2 col-form-label">amount_workers</label>
            <div class="col-sm-10">
                <input
                    type="number"
                    class="form-control"
                    id="amount_workers"
                    name="amount_workers"
                    value="{{ $company->amount_workers ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="years" class="col-sm-2 col-form-label">years</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="years"
                    name="years"
                    value="{{ $company->years ?? 0 }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="comment" class="col-sm-2 col-form-label">comment</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="comment"
                    name="comment"
                    value="{{ $company->comment ?? '' }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <ul class="list-group">
        @foreach($company->employees as $employee)
            <li class="list-group-item">
                <a href="{{ route('employees.show', $employee) }}">
                    {{ $employee->full_name }}
                </a>
            </li>
        @endforeach
    </ul>

</div>

@endsection
