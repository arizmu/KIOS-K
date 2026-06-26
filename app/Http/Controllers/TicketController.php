<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function createTiket(Request $request)
    {
        try {
            $tanggalSekarang = Carbon::now()->format('Y-m-d');
            $getLastTicket = Ticket::whereDate('tanggal', $tanggalSekarang)->latest()->first();
            $noAntrian = $getLastTicket ? $getLastTicket->no_antrian + 1 : 1;

            $data = [
                'nama' => $request->nama,
                'no_antrian' => str_pad($noAntrian, 3, '0', STR_PAD_LEFT),
                'catatan' => $request->catatan,
                'tanggal' => $tanggalSekarang,
                'status' => 'open'
            ];

            $queryTiket = Ticket::create($data);

            return response()->json([
                'message' => 'Tiket berhasil dibuat',
                'data' => $queryTiket,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tiket gagal dibuat',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    public function newTiket()
    {
       return "ok";
    }
}
