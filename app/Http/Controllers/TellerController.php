<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TellerController extends Controller
{
    public function TellerLayouts()
    {
        return view('pages.tellers.teller-index');
    }

    public function getLokets(Request $request)
    {
        $lokets = Loket::query()
            ->when($request->search, function ($query, $search) {
                $query->where('loket', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%");
            })
            ->get();

        return response()->json($lokets);
    }

    public function store(Request $request)
    {
        $loket = Loket::create([
            'loket' => $request->loket,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json($loket, 201);
    }

    public function update(Request $request, $id)
    {
        $loket = Loket::findOrFail($id);
        $loket->update([
            'loket' => $request->loket,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json($loket);
    }

    public function destroy($id)
    {
        $loket = Loket::findOrFail($id);
        $loket->delete();

        return response()->json(null, 204);
    }

    public function bukaLoket(Request $request)
    {   
        DB::beginTransaction();
        try {
            $getUser = Auth::user();
            $queryOpenLoket = Loket::find($request->loket_id);
            $queryOpenLoket->update([
                'is_active' => true,
                'user_aktive' => $getUser->id,
            ]);
            DB::commit();
            return response()->json([
                'metadata' => [
                    'status' => 200,
                    'message' => 'success',
                ],
                'response' => [
                    'data' => $queryOpenLoket,
                    'request' => $request->all(),
                ],
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'metadata' => [
                    'status' => 500,
                    'message' => 'error',
                ],
                'response' => [
                    'errors' => $th->getMessage(),
                    'request' => $request->all(),
                ],
            ], 500);
        }
    }

    public function tutupLoket(Request $request)
    {
        $loket = Loket::find($request->loket_id);
        $loket->update([
            'is_active' => false,
            'user_aktive' => null,
        ]);
        return response()->json([
            'metadata' => [
                'status' => 200,
                'message' => 'success',
            ],
            'response' => [
                'data' => '',
                'request' => $request->all(),
            ],
        ]);
    }

    public function getMyLoketActive()
    {
        $user = auth()->user();
        $loket = Loket::where('is_active', true)->where('user_aktive', $user->id)->first();
        $data = [
            'id' => $loket->id ?? '',
            'loket' => $loket->loket ?? '',
            'status' => $loket->is_active ?? false,
        ];

        return response()->json([
            'metadata' => [
                'status' => 200,
                'message' => 'success',
            ],
            'response' => [
                'data' => $data,
            ],
        ]);
    }
}
