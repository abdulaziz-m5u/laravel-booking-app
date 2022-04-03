@extends('layouts.admin')
@section('content')

<div class="container">    
    <div class="card">
        <div class="card-header">
            Calendar
        </div>

        <div class="card-body">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
            <form>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="room_id">Room</label>
                            <select class="form-control select2" name="room_id" id="room_id">
                                @foreach($rooms as $id => $room)
                                    <option value="{{ $id }}" {{ request()->input('room_id') == $id ? 'selected' : '' }}>{{ $room }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="customer_id">customer</label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                @foreach($customers as $id => $customer)
                                    <option value="{{ $id }}" {{ request()->input('customer_id') == $id ? 'selected' : '' }}>{{ $customer }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary mt-4">
                            Filter
                        </button>
                    </div>
                </div>
            </form>

            <div id='calendar'></div>
        </div>
    </div>
</div>

@endsection

@push('script-alt')
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
           
            bookings={!! json_encode($bookings) !!};
          
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: bookings


            });
        });
</script>

@endpush