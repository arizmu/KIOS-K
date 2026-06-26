<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function displayInfo() {

    }

    public function displayData() {

        $query = Ticket::whereDate('created_at', today())->get();
        $totalantrian = $query->count();
        $totaldilayani = $query->where('status', 'done')->count();
        $data =[
            "jumlahantrian" => $totalantrian,
            "jumlahdilayani" => $totaldilayani
        ];

        return response()->json([
            "status" => [
                'code' => 200,
                'message' => 'ok' 
            ],
            "response" => $data
        ]);
    }
}
