<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class EMRController extends Controller
{
    public function index()
    {
        $dataPasien = Pasien::all();
        return view('emr', compact('dataPasien'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Validasi untuk kolom wajib diisi
            'nama_lengkap' => 'required|string|max:255',
            'nomor_rm' => 'required|string|max:20|unique:pasien,nomor_rm',
            'tanggal_lahir' => 'required|date',
            'nomor_ktp' => 'nullable|string|max:20|unique:pasien,nomor_ktp',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tanggal_pendaftaran' => 'required|date',
            'no_tlp' => 'required|string|max:20',

            // Validasi untuk kolom opsional
            'pas_foto' => 'nullable|string', // Asumsi menyimpan path file
            'tempat_lahir' => 'nullable|string|max:100',
            'agama' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'golongan_darah' => 'nullable|string|in:A,B,AB,O',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:100',
            'email' => 'nullable|email|unique:pasien,email',
            'alamat_rumah' => 'nullable|string',
            'provinsi' => 'nullable|string|max:100',
            'kota_kabupaten' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kelurahan' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
        ]);

        $pasien = Pasien::create($validatedData);

        return response()->json([
            'message' => 'Data pasien berhasil ditambahkan.',
            'data' => $pasien
        ], 201);
    }

    public function show($id_pasien)
    {
        $pasien = Pasien::with([
            'penanggungJawab',
            'riwayatPasien',
            'psikososialSpiritual'
        ])->find($id_pasien);

        if (!$pasien) {
            return response()->json(['message' => 'Data pasien tidak ditemukan.'], 404);
        }

        return response()->json($pasien);
    }

    public function update(Request $request, $id_pasien)
    {
        $pasien = Pasien::find($id_pasien);

        if (!$pasien) {
            return response()->json(['message' => 'Data pasien tidak ditemukan.'], 404);
        }

        $validatedData = $request->validate([
            // Validasi untuk kolom yang bisa diperbarui
            'nama_lengkap' => 'sometimes|required|string|max:255',
            'nomor_rm' => 'sometimes|required|string|max:20|unique:pasien,nomor_rm,' . $pasien->id_pasien . ',id_pasien',
            'tanggal_lahir' => 'sometimes|required|date',
            'nomor_ktp' => 'nullable|string|max:20|unique:pasien,nomor_ktp,' . $pasien->id_pasien . ',id_pasien',
            'jenis_kelamin' => 'sometimes|required|string|in:Laki-laki,Perempuan',
            'tanggal_pendaftaran' => 'sometimes|required|date',
            'no_tlp' => 'sometimes|required|string|max:20',

            // Validasi untuk kolom opsional lainnya
            'pas_foto' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|max:100',
            'agama' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'golongan_darah' => 'nullable|string|in:A,B,AB,O',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:100',
            'email' => 'nullable|email|unique:pasien,email,' . $pasien->id_pasien . ',id_pasien',
            'alamat_rumah' => 'nullable|string',
            'provinsi' => 'nullable|string|max:100',
            'kota_kabupaten' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kelurahan' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
        ]);

        $pasien->update($validatedData);

        return response()->json([
            'message' => 'Data pasien berhasil diperbarui.',
            'data' => $pasien
        ]);
    }
}
