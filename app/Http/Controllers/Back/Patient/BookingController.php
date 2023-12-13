<?php

namespace App\Http\Controllers\Back\Patient;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showBooking()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->with('doctor', 'user')->orderBy('id', 'DESC')->paginate();
        return view('back.patient.bookings', compact('bookings'));
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
