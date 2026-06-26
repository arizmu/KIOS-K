<?php

namespace App\Http\Controllers;

use App\Events\PanggilAntrian;
use App\Models\Loket;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PemanggilController extends Controller
{
    public function PemanggilLayouts()
    {
        return view('pages.pemanggil');
    }

    public function getAntrian()
    {
        $queryAntrian = Ticket::query()
            ->whereDate('tanggal', Carbon::now()->format('Y-m-d'))
            ->whereIn('status', ['open', 'called', 'pending', 'done', 'cancel', 'close'])
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'status' => [
                'code' => 200,
                'message' => 'Success',
            ],
            'metadata' => [
                'total' => $queryAntrian->count(),
            ],
            'data' => $queryAntrian,

        ]);
    }

    public function panggilAntrian($id)
    {
        try {
            $antrian = Ticket::find($id);
            $loketAntrian = Loket::where('is_active', true)
                ->where('user_aktive', Auth::user()->id)
                ->first();
            if (! $loketAntrian) {
                return response()->json([
                    'metadata' => [
                        'code' => 404,
                        'message' => 'Loket tidak ditemukan, silahkan aktifkan loket terlebih dahulu',
                    ],
                    'response' => [
                        'data' => null,
                    ],
                ], 404);
            }
            $data = [
                'no_antrian' => $antrian->no_antrian,
                'nama' => $antrian->nama ?? '-',
                'loket' => $loketAntrian->loket,
            ];
            broadcast(new PanggilAntrian($data));
            return response()->json([
                'metadata' => [
                    'code' => 200,
                    'message' => 'Panggilan berhasil',
                ],
                'response' => [
                    'data' => $data,
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Broadcast gagal: '.$e->getMessage());
        }

        return response()->json([
            'status' => [
                'code' => 200,
                'message' => 'Success',
            ],
            'data' => $antrian,
        ]);

    }

    public function selesaiLayanan($id) {
        $query = Ticket::find($id);
        $query->update([
            'status' => 'done'
        ]);

        return response()->json([
            'metadata' => [
                'code' => 200,
                'message' => 'Layanan selesai',
            ],
            'response' => [
                'data' => $query,
            ],  
        ]);
    }
}
