<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Customer - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('customers.store') }}" method="POST">

                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAME</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Enter Customer Name">

                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">EMAIL</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Enter Customer Email">

                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PHONE NUMBER</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}"
                                    placeholder="Enter Customer Phone Number">

                                @error('phone_number')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">MOVIE TITLE</label>
                                <input type="text" class="form-control @error('movie_title') is-invalid @enderror"
                                    name="movie_title" value="{{ old('movie_title') }}" placeholder="Enter Movie Title">

                                @error('movie_title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">SHOW TIME</label>
                                        <input type="time"
                                            class="form-control @error('show_time') is-invalid @enderror"
                                            name="show_time" value="{{ old('show_time') }}">

                                        @error('show_time')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">NUMBER OF TICKETS</label>
                                        <input type="number"
                                            class="form-control @error('num_tickets') is-invalid @enderror"
                                            name="num_tickets" value="{{ old('num_tickets') }}"
                                            placeholder="Enter Number of Tickets">

                                        @error('num_tickets')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">TOTAL PRICE</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('total_price') is-invalid @enderror"
                                            name="total_price" value="{{ old('total_price') }}"
                                            placeholder="Enter Total Price">

                                        @error('total_price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">BOOKING DATE</label>
                                        <input type="date"
                                            class="form-control @error('booking_date') is-invalid @enderror"
                                            name="booking_date" value="{{ old('booking_date') }}">

                                        @error('booking_date')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
