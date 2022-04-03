@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('view room') }}
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <tr>
                            <th>room number</th>
                            <td>{{ $room->room_number }}</td>
                        </tr>
                        <tr>
                            <th>floor</th>
                            <td>{{ $room->floor }}</td>
                        </tr>
                        <tr>
                            <th>description</th>
                            <td>{{ $room->description }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            

        <!-- Tab panes -->
        <div class="card-header py-3 mt-5 bg-info text-white d-flex">
                <h6 class="m-0 font-weight-bold text-white">
                    {{ __('view Booking') }}
                </h6>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-booking" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th width="10"></th>
                        <th>customer</th>
                        <th>room number</th>
                        <th>price</th>
                        <th>capacity</th>
                        <th>time-from</th>
                        <th>time-to</th>
                        <th>additional-information</th>
                        <th>action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse($bookings as $booking)
                            <tr data-entry-id="{{ $booking->id }}">
                                <td></td>
                                <td field-key='customer'>{{ $booking->customer->full_name  }}</td>
                                <td field-key='room'>{{ $booking->room->room_number }}</td>
                                <td field-key='room'>{{ $booking->price }}</td>
                                <td field-key='room'>{{ $booking->capacity }}</td>
                                <td field-key='time_from'>{{ $booking->time_from }}</td>
                                <td field-key='time_to'>{{ $booking->time_to }}</td>
                                <td field-key='additional_information'>{!! $booking->additional_information !!}</td>
                                <td>
                                    @can('booking_view')
                                        <a href="{{ route('admin.bookings.show',[$booking->id]) }}"
                                            class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                                    @endcan
                                    @can('booking_edit')
                                        <a href="{{ route('admin.bookings.edit',[$booking->id]) }}"
                                            class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('booking_delete')
                                    <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="10">data not found !</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    <!-- Content Row -->

</div>
@endsection


@push('script-alt')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = 'delete selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bookings.mass_destroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });
      if (ids.length === 0) {
        alert('zero selected')
        return
      }
      if (confirm('are you sure ?')) {
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  });
  $('.datatable-booking:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush