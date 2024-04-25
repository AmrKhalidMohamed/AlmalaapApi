@extends('layouts.app')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

    <div class="container">

        <h3 align="center" class="mt-5">Rooms Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('roomsview.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Room number</label>
                            <input type="text" class="form-control" name="room_number">
                        </div>
                        <div class="col-md-6">
                            <label>Capacity</label>
                            <input type="number" class="form-control" name="capacity">
                        </div>
                         <div class="col-md-6">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        <div class="col-md-6">
                            <label>Branch</label>
                            <input type="text" class="form-control" name="branch">
                        </div>
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="5"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label>Ardescription</label>
                            <textarea type="text" class="form-control" name="ArDescription" rows="5"></textarea>
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
                        <th scope="col">Room number</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Ar description</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Images</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $rooms as $key => $room )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $room->room_number }}</td>
                            <td scope="col">{{ $room->capacity }}</td>
                            <td scope="col">{{ $room->price }}</td>
                            <td scope="col">{{ $room->description }}</td>
                            <td scope="col">{{ $room->ArDescription }}</td>
                            <td scope="col">{{ $room->branch }}</td>
                            <td scope="col">
                                @foreach ($room->images as $image)
                                    <img src="{{ storage::url($image->image_path) }}" width="100px" alt="Room Image">
                                @endforeach</td>
                            <td scope="col">

                            <a href="{{  route('roomsview.edit', $room->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>

                            <form action="{{ route('roomsview.destroy', $room->id) }}" method="POST" style ="display:inline">
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
