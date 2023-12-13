<?php

namespace App\Http\Controllers;

use App\Http\Requests\Front\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookings()
    {
        $bookings = Booking::where('doctor_id', auth()->user()->id)->orderBy('id', 'desc')->paginate();
        return view('back.doctor.bookings', compact('bookings'));
    }

    public function store(BookingRequest $request)
    {
        Booking::create([
            'user_id' => auth()->user()->id,
            'doctor_id' => $request->id,
            'book' => $request->book,
        ]);
        toastr()->addSuccess('Booked successfully');
        return back();
    }

    public function acceptBooking($id)
    {
        Booking::where('id', $id)->update(['status' => 'accepted']);
        toastr()->addSuccess('Booking accepted successfully');
        return back();
    }

    public function completeBooking($id)
    {
        Booking::where('id', $id)->update(['status' => 'complete']);
        toastr()->addSuccess('Booking completed successfully');
        return back();
    }

    public function cancelBooking($id)
    {
        Booking::where('id', $id)->update(['status' => 'canceled']);
        toastr()->addSuccess('Booking canceled successfully');
        return back();
    }

    public function destroy($id)
    {
        Booking::where('id', $id)->delete();
        toastr()->addSuccess('Booking deleted successfully');
        return back();
    }
}
