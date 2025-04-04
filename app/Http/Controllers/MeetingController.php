<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();
        return view('meetings.index', compact('meetings'));
    }
}
// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class MeetingController extends Controller
// {
//     //
// }
