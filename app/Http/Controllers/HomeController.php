<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function DashboardLayout()
    {
        return view('pages.dashboard');
    }

    public function statistikHello()
    {
        try {
            $today = Carbon::today()->toDateString();

           $driver = DB::getDriverName();

            if ($driver === 'sqlite') {
                $avgRatawaktu = "COALESCE(AVG(CASE WHEN status = 'done' THEN CAST((julianday(updated_at) - julianday(created_at)) * 24 * 60 AS INTEGER) END), 0)";
            } else {
                $avgRatawaktu = "COALESCE(AVG(CASE WHEN status = 'done' THEN TIMESTAMPDIFF(MINUTE, created_at, updated_at) END), 0)";
            }

            $stats = Ticket::whereDate('created_at', $today)
                ->selectRaw('COUNT(id) as totalantrian')
                ->selectRaw("SUM(CASE WHEN status = 'done' THEN 1 ELSE 0 END) as terlayani")
                ->selectRaw("SUM(CASE WHEN status IN ('open', 'pending', 'called') THEN 1 ELSE 0 END) as belumlayani")
                ->selectRaw("{$avgRatawaktu} as ratawaktu")
                ->first();

            $data = [
                'totalantrian' => (int) $stats->totalantrian,
                'terlayani' => (int) $stats->terlayani,
                'belumlayani' => (int) $stats->belumlayani,
                'ratawaktu' => round((float) $stats->ratawaktu, 1),
            ];

            return response()->json([
                'status' => [
                    'code' => 200,
                    'message' => 'ok',
                    'errors' => null,
                ],
                'response' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => [
                    'code' => 500,
                    'message' => 'error',
                    'errors' => $th->getMessage(),
                ],
                'response' => null,
            ], 500);
        }
    }

    public function statistikTeller()
    {
        try {
            $stats = Loket::selectRaw('COUNT(*) as totalteller')
                ->selectRaw('COUNT(CASE WHEN is_active = 1 THEN 1 END) as telleraktif')
                ->selectRaw('COUNT(CASE WHEN is_active = 0 THEN 1 END) as tellernonaktif')
                ->first();

            $data = [
                'totalteller' => (int) $stats->totalteller,
                'telleraktif' => (int) $stats->telleraktif,
                'tellernonaktif' => (int) $stats->tellernonaktif,
            ];

            return response()->json([
                'status' => [
                    'code' => 200,
                    'message' => 'ok',
                    'errors' => null,
                ],
                'response' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => [
                    'code' => 500,
                    'message' => 'error',
                    'errors' => $th->getMessage(),
                ],
                'response' => null,
            ], 500);
        }
    }

    public function statistikMingguan()
    {
        try {
            $startOfWeek = Carbon::now()->startOfWeek();
            $endOfWeek = Carbon::now()->endOfWeek();

            $stats = Ticket::whereBetween('tanggal', [$startOfWeek, $endOfWeek])
                ->selectRaw('COUNT(*) as totalantrian')
                ->selectRaw("COUNT(CASE WHEN status = 'done' THEN 1 END) as terlayani")
                ->selectRaw("COUNT(CASE WHEN status != 'done' THEN 1 END) as tidakterlayani")
                ->first();

            $totalantrian = (int) $stats->totalantrian;
            $terlayani = (int) $stats->terlayani;
            $tidakterlayani = (int) $stats->tidakterlayani;
            $persentase = $totalantrian > 0 ? round(($terlayani / $totalantrian) * 100, 1) : 0;

            $data = compact('totalantrian', 'terlayani', 'tidakterlayani', 'persentase');

            return response()->json([
                'status' => [
                    'code' => 200,
                    'message' => 'ok',
                    'errors' => null,
                ],
                'response' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => [
                    'code' => 500,
                    'message' => 'error',
                    'errors' => $th->getMessage(),
                ],
                'response' => null,
            ], 500);
        }
    }
}
