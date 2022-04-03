<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Booking;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => Booking::class,
            'date_field' => 'time_from',
            'date_field_to' => 'time_to',
            'field'      => 'additional_information',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.bookings.edit',
        ],
    ];

    public function index(Request $request)
    {
        $bookings = [];
        $rooms = Room::all()->pluck('room_number', 'id');
        $customers = Customer::all()->pluck('full_name', 'id');

        foreach ($this->sources as $source) {
            $models = $source['model']::when($request->input('room_id'), function ($query) use ($request) {
                    $query->where('room_id', $request->input('room_id'));
                })
                ->when($request->input('customer_id'), function ($query) use ($request) {
                    $query->where('customer_id', $request->input('customer_id'));
                })
                ->get();
            foreach ($models as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);
                $crudFieldValueTo = $model->getOriginal($source['date_field_to']);

                if (!$crudFieldValue && $crudFieldValueTo) {
                    continue;
                }

                $bookings[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'end' => $crudFieldValueTo,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }
        
        return view('admin.calendar.calendar', compact('bookings', 'rooms', 'customers'));

    }

}
