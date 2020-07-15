@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="post" action="{{ route('employees.update', $employee) }}">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label for="full_name" class="col-sm-2 col-form-label">name</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        id="full_name"
                        name="full_name"
                        value="{{ $employee->full_name ?? '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="company" class="col-sm-2 col-form-label">company</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        id="company"
                        name="company"
                        value="{{ $employee->company->name ?? '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="position" class="col-sm-2 col-form-label">position</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        id="position"
                        name="position"
                        value="{{ $employee->position ?? '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $employee->email ?? '' }}">
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
                        value="{{ $employee->linkedin ?? '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">status</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        id="status"
                        name="status"
                        value="{{ $employee->status ?? '' }}">
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
                        value="{{ $employee->comment ?? '' }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
