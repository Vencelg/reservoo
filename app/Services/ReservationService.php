<?php

namespace App\Services;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use App\Services\Interfaces\ReservationServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ReservationService implements ReservationServiceInterface
{

    public function authUserList(): Collection
    {
        return Reservation::where('user_id', Auth::id())->get();
    }

    public function store(StoreReservationRequest $request): Reservation
    {
        $reservation = new Reservation([
            'user_id' => Auth::id(),
            'table_id' => $request->input('table_id'),
            'reserved_from' => $request->input('reserved_from'),
            'reserved_to' => $request->input('reserved_to'),
        ]);
        $reservation->save();

        return $reservation;
    }
}
