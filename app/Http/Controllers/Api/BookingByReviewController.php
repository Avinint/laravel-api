<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingByReviewShowResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingByReviewController extends Controller
{
    /**
     * Handle the incoming request.
     * @param $reviewKey
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($reviewKey, Request $request)
    {
        $bookingRessource =  new BookingByReviewShowResource(Booking::findByReviewKey($reviewKey));

        return  $bookingRessource ?? abort(404);
    }
}
