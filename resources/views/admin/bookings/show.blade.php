@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('view booking') }}
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <tr>
                            <th>customer</th>
                            <td>{{ $booking->customer->full_name }}</td>
                        </tr>
                        <tr>
                            <th>room</th>
                            <td>{{ $booking->room->room_number }}</td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td>${{ $booking->room->price }}</td>
                        </tr>
                        <tr>
                            <th>time from</th>
                            <td>{{ $booking->time_from }}</td>
                        </tr>
                        <tr>
                            <th>time to</th>
                            <td>{{ $booking->time_to }}</td>
                        </tr>
                        <tr>
                            <th>amount</th>
                            <td>{{ $booking->amount }}</td>
                        </tr>
                        <tr>
                            <th>additional information</th>
                            <td>{{ $booking->additional_information }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection