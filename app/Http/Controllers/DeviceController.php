<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;

class DeviceController extends Controller
{
    public function index(){
        return Device::get();

    }

    public function store(Request $request)
    {
        $device = new \App\Device();
        $device -> description = $request -> description;
        $device -> intensityfactor = $request -> intensityfactor;
        $device -> totalmovementcounter = $request -> totalmovementcounter; 
        $device -> maximumliftuptowarning = $request -> maximumliftuptowarning;
        $device -> basicforce = $request -> basicforce;
        $device -> carrera = $request -> carrera;
        $device -> save();
        return Device::get();
    }
}
