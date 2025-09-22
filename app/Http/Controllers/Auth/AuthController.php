<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Account;
use App\Models\Pasien;
use Illuminate\Support\Str; // <-- Tambahkan baris ini

class AuthController extends Controller
{
    // Logika untuk Register
    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:accounts'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Buat akun baru di tabel 'accounts'
        $account = Account::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pasien',
        ]);
        
        // Hasilkan nomor rekam medis unik. Anda bisa menyesuaikan formatnya.
        $nomorRekamMedis = 'RM-' . date('Ymd') . '-' . Str::random(5); 

        // Buat entri pasien baru di tabel 'pasien' dengan nomor_rm yang dihasilkan
        $pasien = Pasien::create([
            'email' => $request->email,
            'nama_lengkap' => $request->username, 
            'tanggal_pendaftaran' => now(), 
            'nomor_rm' => $nomorRekamMedis, // <-- BARIS BARU: Tambahkan nomor_rm
        ]);

        $token = $account->createToken('authToken')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Akun dan data pasien berhasil didaftarkan.',
            'data' => [
                'account' => $account,
                'token' => $token,
                'pasien_id' => $pasien->id_pasien, 
            ]
        ], 201);
    }

    // Logika untuk Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $account = Account::where('email', $request->email)->first();

        if (!$account || !Hash::check($request->password, $account->password)) {
            throw ValidationException::withMessages([
                'email' => ['Kredensial yang Anda masukkan salah.'],
            ]);
        }
        
        $pasien = Pasien::where('email', $account->email)->first();
        if (!$pasien) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data pasien tidak ditemukan.',
                'data' => null
            ], 404);
        }

        $account->tokens()->delete();
        $token = $account->createToken('authToken')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil.',
            'data' => [
                'account' => [
                    'id' => $account->id,
                    'username' => $account->username,
                    'email' => $account->email,
                    'role' => $account->role,
                    'pasien_id' => $pasien->id_pasien, 
                ],
                'token' => $token,
            ]
        ]);
    }
}