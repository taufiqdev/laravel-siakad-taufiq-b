<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
        //$subjects=Subject::pagination(10);
        //$subjects = \App\Models\Schedule::paginate(10);
        $schedules = Schedule::paginate(10);
        return view('pages.schedules.index', compact('schedules'));
    }

    //create qrcode
    //public function createQrcode()
    public function generateQrCode(Schedule $schedule)
    {
        //return view('pages.schedules.show-qrcode')->with('schedule', $schedule);
        return view('pages.schedules.input-qrcode')->with('schedule', $schedule);
    }

    public function generateQrcodeUpdate(Request $request, Schedule $schedule)
    {
        $request->validate([
            'code' => 'required',

        ]);

        //dd($schedule);
        //dd($request->id);
        $schedule->update(['kode_absensi' =>$request->code]);
        return view('pages.schedules.show-qrcode', compact('schedule'))->with('success', 'Code updated successfully');
        /* $schedule=Schedule::where('id', $request->id)->first();
        if($schedule){
            $schedule->update(['kode_absensi' =>$request->code]);
            return view('pages.schedules.show-qrcode', compact('schedule'))->with('success', 'Code updated successfully');
        }
         else {
            return redirect()->route('schedule.index')->with('error', 'Code not found'); 
        } */

        
    }
    

    // //generate qrcode
/*     public function generateQrcodeUpdate(Request $request)
    {
        $request->validate([
            'code' => 'required',

        ]);

        $code = $request->code;

        return view('pages.schedule.show-qrcode', compact('code'));
    }
     */
}
