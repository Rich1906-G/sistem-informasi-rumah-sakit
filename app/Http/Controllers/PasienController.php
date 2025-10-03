<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    // index: return blade with datatable
    public function index()
    {
        return view('testing.testing');
    }

    // DataTables server-side
    public function data(Request $request)
    {
        $query = Pasien::query();

        return DataTables::of($query)
            ->addColumn('actions', function ($row) {
                return view('pasiens.partials.actions', compact('row'))->render();
            })
            ->editColumn('tanggal_lahir', function ($row) {
                return $row->tanggal_lahir ? $row->tanggal_lahir->format('Y-m-d') : null;
            })
            ->make(true);
    }

    // store new pasien (JSON)
    public function store(Request $request)
    {
        // dd('Kode berhasil masuk ke dalam fungsi store');
        $rules = $this->rules();
        $validated = $request->validate($rules);

        // dd('Validasi berhasil, data tervalidasi:', $validated);

        // handle foto upload
        if ($request->hasFile('pas_foto')) {

            $path = $request->file('pas_foto')->store('pas_foto', 'public');
            $validated['pas_foto'] = $path;
        }

        // nomor_rm auto-generate jika kosong
        if (empty($validated['nomor_rm'])) {
            $validated['nomor_rm'] = $this->generateNomorRM();
        } else {
            // ensure uniqueness
            $exists = Pasien::where('nomor_rm', $validated['nomor_rm'])->exists();
            if ($exists) {
                return response()->json(['status' => 'error', 'message' => 'Nomor RM sudah dipakai.'], 422);
            }
        }

        $pasien = Pasien::create($validated);
        // dd('data berhasil di upload', $pasien);
        return response()->json(['status' => 'success', 'message' => 'Pasien berhasil ditambah', 'data' => $pasien]);
    }

    // get by id -> untuk edit
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return response()->json(['status' => 'success', 'data' => $pasien]);
    }

    // update
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $rules = $this->rules($id);
        $validated = $request->validate($rules);

        if ($request->hasFile('pas_foto')) {
            // delete old if exists
            if ($pasien->pas_foto && Storage::disk('public')->exists($pasien->pas_foto)) {
                Storage::disk('public')->delete($pasien->pas_foto);
            }
            $validated['pas_foto'] = $request->file('pas_foto')->store('pas_foto', 'public');
        }

        // nomor_rm uniqueness (allow unchanged)
        if (!empty($validated['nomor_rm']) && $validated['nomor_rm'] !== $pasien->nomor_rm) {
            $exists = Pasien::where('nomor_rm', $validated['nomor_rm'])->where('id_pasien', '!=', $id)->exists();
            if ($exists) {
                return response()->json(['status' => 'error', 'message' => 'Nomor RM sudah dipakai'], 422);
            }
        }

        $pasien->update($validated);

        return response()->json(['status' => 'success', 'message' => 'Pasien berhasil diupdate', 'data' => $pasien]);
    }

    // soft delete
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return response()->json(['status' => 'success', 'message' => 'Pasien berhasil dihapus']);
    }

    // helper rules
    protected function rules($id = null)
    {
        $uniqueRM = $id ? Rule::unique('pasien', 'nomor_rm')->ignore($id, 'id_pasien') : 'unique:pasien,nomor_rm';
        return [
            'nama_lengkap' => 'required|string|max:255',
            'nomor_rm' => ['nullable', 'string', 'max:50', $uniqueRM],
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nomor_ktp' => 'nullable|digits_between:5,25',
            'jenis_kelamin' => ['required', Rule::in(['laki-laki', 'perempuan'])],
            'agama' => ['required', Rule::in(['islam', 'katolik', 'hindu', 'buddha', 'kristen', 'konghucu', 'lainnya'])],
            'status' => ['required', Rule::in(['Belum Menikah', 'Menikah', 'Cerai Hidup', 'Cerai Mati', 'lainnya'])],
            'golongan_darah' => ['required', Rule::in(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-', 'lainnya'])],
            'pendidikan_terakhir' => ['required', Rule::in(['smp_ke_bawah', 'sma', 'diploma_d3', 'sarjana_s1', 'master', 'lainnya'])],
            'pekerjaan' => 'required|string|max:255',
            'no_tlp' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:191',
            'tanggal_pendaftaran' => 'nullable|date',
            'alamat_rumah' => 'nullable|string',
            'provinsi' => 'nullable|string|max:191',
            'kota_kabupaten' => 'nullable|string|max:191',
            'kecamatan' => 'nullable|string|max:191',
            'kelurahan' => 'nullable|string|max:191',
            'kode_pos' => 'nullable|string|max:10',
            'pas_foto' => 'nullable|image|max:2048',
        ];
    }

    protected function generateNomorRM()
    {
        // Format: RM + YYYYMMDD + 4-digit random, ensures uniqueness
        do {
            $no = 'RM' . now()->format('Ymd') . Str::upper(Str::random(4));
            $exists = Pasien::where('nomor_rm', $no)->exists();
        } while ($exists);
        return $no;
    }
}
