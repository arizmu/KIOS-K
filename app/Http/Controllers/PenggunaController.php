<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    public function PenggunaLayouts() {
        return view('pages.pengguna.pengguna-index');
    }

    public function getPenggunas(Request $request)
    {
        $pengguna = User::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->when($request->role, function ($query, $role) {
                $query->where('role', $role);
            })
            ->get();
        return response()->json($pengguna);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:administrator,teller',
            'username' => 'required|string|max:255|unique:users,username'
        ]);

        $pengguna = User::create($validated);
        return response()->json($pengguna, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:administrator,teller'
        ]);

        $pengguna = User::findOrFail($id);
        
        if (empty($validated['password'])) {
            unset($validated['password']);
        }
        
        $pengguna->update($validated);
        return response()->json($pengguna);
    }

    public function destroy($id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->delete();

        return response()->json(null, 204);
    }

}
