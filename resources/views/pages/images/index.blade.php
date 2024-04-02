@extends('layouts.app')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;
@endphp
<div class="container">

    <h3 align="center" class="mt-5">Image Management</h3>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

        <div class="form-area">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
            <form method="POST" action="{{ route('imagesview.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Chose file</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-6">
                        <label>Room ID</label>
                        <input type="text" class="form-control" name="room_id">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>

                </div>
            </form>
        </div>

            <table class="table mt-5">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room ID</th>
                    <th scope="col">Images</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach ( $images as $key => $image )

                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $image->room_id }}</td>
                        <td scope="col"><img src="{{ storage::url($image->image_path) }}" width="100px" alt="Room Image"></td>
                        <td scope="col">

                        <form action="{{ route('imagesview.destroy', $image->id) }}" method="POST" style ="display:inline">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </td>

                      </tr>

                    @endforeach




                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection


@push('css')
<style>
    .form-area{
        padding: 20px;
        margin-top: 20px;
        background-color:#b3e5fc;
    }

    .bi-trash-fill{
        color:red;
        font-size: 18px;
    }

    .bi-pencil{
        color:green;
        font-size: 18px;
        margin-left: 20px;
    }
</style>
@endpush
