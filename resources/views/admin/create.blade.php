@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Create Book
                        <a href="{{ url('books') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('books') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="">Book Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Book Description</label>
                            <input type="text" name="description" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Book Price</label>
                            <input type="number" name="price" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Categories</label>
                            <select name="category_id" class="form-control" >
                                <option value="">Select Category</option>
                                @foreach ($allCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection