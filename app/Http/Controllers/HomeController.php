<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $event =[];

        $appointments = Appointment::with(['client', 'employee'])->get();

        foreach ($appointments as $appointments) {
            $event[] = [
                'title' => $appointments->client->name . ' (' . $appointments->employee->name. ')',
                'start' => $appointments->start_time,
                'end' => $appointments->finish_time,
            ];
        }
        return view('home', compact('event'));
    }
}
