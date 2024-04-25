@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Room Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('roomsview.update', $room->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Room number</label>
                            <input type="text" class="form-control" name="room_number" value="{{ $room->room_number }}">
                        </div>
                        <div class="col-md-6">
                            <label>Capacity</label>
                            <input type="number" class="form-control" name="capacity" value="{{ $room->capacity }}">
                        </div>
                        <div class="col-md-6">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $room->price }}">
                        </div>
                        <div class="col-md-6">
                            <label>Branch</label>
                            <input type="text" class="form-control" name="branch" value="{{ $room->branch }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="5">
                                {{ $room->description }}
                            </textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>ArDescription</label>
                            <textarea type="text" class="form-control" name="ArDescription" rows="5">
                                {{ $room->ArDescription }}
                            </textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>

                    </div>
                </form>
            </div>

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
