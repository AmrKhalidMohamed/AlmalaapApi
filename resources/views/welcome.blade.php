@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navigation</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .btn-container {
            display: flex;
            justify-content: space-around;
        }

        .btn-container a {
            text-decoration: none;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="btn-container">
            <a href="{{ route('bookingsview.index') }}" class="btn btn-primary">
                Bookings
            </a>
            <a href="{{ route('roomsview.index') }}" class="btn btn-primary">
                Rooms
            </a>
            <a href="{{ route('imagesview.index') }}" class="btn btn-primary">
                Images
            </a>
        </div>
    </div>
</body>

</html>
