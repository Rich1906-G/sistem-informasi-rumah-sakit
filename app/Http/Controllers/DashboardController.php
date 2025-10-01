<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pasien;

use App\Models\DataObat;
use App\Models\Kunjungan;
use App\Models\Pembayaran;
use App\Models\TenagaMedis;
use Illuminate\Http\Request;
use App\Models\PembelianObat;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $subTitle = 'Royal Prima';

        // Get the count for each jenis_kunjungan
        $jenisKunjungan = Kunjungan::select('jenis_kunjungan')
            ->selectRaw('count(*) as total')
            ->groupBy('jenis_kunjungan')
            ->get();

        // You can also get the total patient count for the 'Total Pasien Klinik'
        $totalPasien = Kunjungan::count();

        $tipePasien = Kunjungan::select('tipe_pasien')->distinct()->get();

        // Mengirim semua data ke view dashboard
        return view('dashboard', compact(
            'jenisKunjungan',
            'totalPasien',
            'tipePasien',
            'title',
            'subTitle'
        ));
    }

    public function getChartKunjungan(Request $request)
    {
        $periode = $request->input('periode', 'bulan');
        $tahun = $request->input('tahun', now()->year);
        $jenis = $request->input('jenis_kunjungan', null);
        $tipe = $request->input('tipe_pasien', null);


        $query = Kunjungan::query();

        if ($jenis) {
            $query->where('jenis_kunjungan', $jenis);
        }
        if ($tipe) {
            $query->where('tipe_pasien', $tipe);
        }
        $labels = [];
        $values = [];
        $chartQuery = clone $query;


        if ($periode == 'minggu') {
            $data = $chartQuery->whereYear('tanggal_kunjungan', $tahun)
                ->selectRaw('DAYOFWEEK(tanggal_kunjungan) as hari, COUNT(id_kunjungan) as total')
                ->groupBy('hari')
                ->pluck('total', 'hari');


            $mapHari = [2 => 'Senin', 3 => 'Selasa', 4 => 'Rabu', 5 => 'Kamis', 6 => 'Jumat', 7 => 'Sabtu', 1 => 'Minggu'];
            foreach ($mapHari as $num => $label) {
                $labels[] = $label;
                $values[] = $data[$num] ?? 0;
            }

            // Summary minggu ini vs minggu lalu, menggunakan $summaryQuery yang sudah difilter
            $total = (clone $query)->whereBetween('tanggal_kunjungan', [now()->startOfWeek(), now()->endOfWeek()])->count();
            $last = (clone $query)->whereBetween('tanggal_kunjungan', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();
            $compareText = "dari Minggu lalu";
        } else {
            $data = $chartQuery->whereyear('tanggal_kunjungan', $tahun)
                ->selectRaw('MONTH(tanggal_kunjungan) as bulan, COUNT(id_kunjungan) as total')
                ->groupBy('bulan')
                ->pluck('total', 'bulan');

            $mapBulan = [
                1 => 'Jan',
                2 => 'Feb',
                3 => 'Mar',
                4 => 'Apr',
                5 => 'Mei',
                6 => 'Jun',
                7 => 'Jul',
                8 => 'Agu',
                9 => 'Sep',
                10 => 'Okt',
                11 => 'Nov',
                12 => 'Des'
            ];

            foreach ($mapBulan as $num => $label) {
                $labels[] = $label;
                $values[] = $data[$num] ?? 0;
            }


            // Summary bulan ini vs bulan lalu, menggunakan $summaryQuery yang sudah difilter
            $total = (clone $query)->whereYear('tanggal_kunjungan', $tahun)
                ->whereMonth('tanggal_kunjungan', now()->month)
                ->count();
            $last = (clone $query)->whereYear('tanggal_kunjungan', $tahun)
                ->whereMonth('tanggal_kunjungan', now()->subMonth()->month)
                ->count();
            $compareText = "dari Bulan lalu";
        }

        // Hitung persentase di akhir setelah nilai $total dan $last ditentukan
        if ($last > 0) {
            $percentage = round((($total - $last) / $last) * 100, 1);
        } else {
            $percentage = ($total > 0) ? 100 : 0;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $values,
            'summary' => [
                'total' => $total,
                'percentage' => $percentage,
                'compare_text' => $compareText
            ]
        ]);
    }

    public function getAverageWaktuKonsultasi()
    {
        $baseQuery = Kunjungan::query();

        $averageTotal = (clone $baseQuery)
            ->whereYear('tanggal_kunjungan', now()->year)
            ->whereMonth('tanggal_kunjungan', now()->month)
            ->avg('lama_durasi_menit');

        $averageLast = (clone $baseQuery)
            ->whereYear('tanggal_kunjungan', now()->subMonth()->year)
            ->whereMonth('tanggal_kunjungan', now()->subMonth()->month)
            ->avg('lama_durasi_menit');

        $previousMonthName = now()->translatedFormat('F');
        $compareText = "dari bulan $previousMonthName";

        if ($averageLast > 0) {
            $percentage = round((($averageTotal - $averageLast) / $averageLast) * 100,  1);
        } else {
            $percentage = ($averageTotal > 0) ? 100 : 0;
        }

        // Format waktu ke format m s
        $minutes = floor($averageTotal);
        $seconds = round(($averageTotal - $minutes) * 60);
        $formattedTime = "{$minutes}m {$seconds}s";

        return response()->json([
            'average_time' => $formattedTime,
            'percentage' => $percentage,
            'compare_text' => $compareText,
        ]);
    }


    public function getNewPatients()
    {
        $totalNewPatients = Pasien::whereYear('tanggal_pendaftaran', now()->year)
            ->whereMonth('tanggal_pendaftaran', now()->month)
            ->count();

        $lastMonthNewPatients = Pasien::whereYear('tanggal_pendaftaran', now()->subMonth()->year)
            ->whereMonth('tanggal_pendaftaran', now()->subMonth()->month)
            ->count();

        // Hitung persentase perubahan
        if ($lastMonthNewPatients > 0) {
            $percentage = round((($totalNewPatients - $lastMonthNewPatients) / $lastMonthNewPatients) * 100, 1);
        } else {
            $percentage = ($totalNewPatients > 0) ? 100 : 0;
        }

        // Teks perbandingan
        $currentMonthName = now()->translatedFormat('F');
        $compareText = "dari bulan $currentMonthName";

        return response()->json([
            'total' => $totalNewPatients,
            'percentage' => $percentage,
            'compare_text' => $compareText
        ]);
    }

    public function getRegisteredPatientsSummary()
    {
        // Hitung jumlah pasien unik (total kunjungan) bulan ini
        $registeredThisMonth = Kunjungan::whereYear('tanggal_kunjungan', now()->year)
            ->whereMonth('tanggal_kunjungan', now()->month)
            ->distinct('pasien_id')
            ->count('pasien_id');

        // Hitung jumlah pasien unik (total kunjungan) bulan lalu
        $registeredLastMonth = Kunjungan::whereYear('tanggal_kunjungan', now()->subMonth()->year)
            ->whereMonth('tanggal_kunjungan', now()->subMonth()->month)
            ->distinct('pasien_id')
            ->count('pasien_id');

        // Hitung persentase perubahan
        if ($registeredLastMonth > 0) {
            $percentage = round((($registeredThisMonth - $registeredLastMonth) / $registeredLastMonth) * 100, 1);
        } else {
            $percentage = ($registeredThisMonth > 0) ? 100 : 0;
        }

        // Teks perbandingan
        $currentMonthName = now()->translatedFormat('F');
        $compareText = "dari bulan " . $currentMonthName;

        // dd($registeredThisMonth);

        return response()->json([
            'total' => $registeredThisMonth,
            'percentage' => $percentage,
            'compare_text' => $compareText
        ]);
    }

    public function getAverageWaitTime()
    {
        // Hitung total waktu tunggu bulan ini
        $totalWaitTimeThisMonth = Kunjungan::whereNotNull('waktu_mulai_pemeriksaan')
            ->whereYear('tanggal_kunjungan', now()->year)
            ->whereMonth('tanggal_kunjungan', now()->month)
            ->get()
            ->sum(function ($kunjungan) {
                $appointmentTime = Carbon::parse($kunjungan->tanggal_kunjungan . ' ' . $kunjungan->jam_kunjungan);
                $startTime = Carbon::parse($kunjungan->waktu_mulai_pemeriksaan);
                return abs($startTime->diffInMinutes($appointmentTime));
            });


        // Hitung total kunjungan valid bulan ini
        $countThisMonth = Kunjungan::whereNotNull('waktu_mulai_pemeriksaan')
            ->whereYear('tanggal_kunjungan', now()->year)
            ->whereMonth('tanggal_kunjungan', now()->month)
            ->count();


        // Hitung total waktu tunggu bulan lalu
        $totalWaitTimeLastMonth = Kunjungan::whereNotNull('waktu_mulai_pemeriksaan')
            ->whereYear('tanggal_kunjungan', now()->subMonth()->year)
            ->whereMonth('tanggal_kunjungan', now()->subMonth()->month)
            ->get()
            ->sum(function ($kunjungan) {
                $appointmentTime = Carbon::parse($kunjungan->tanggal_kunjungan . ' ' . $kunjungan->jam_kunjungan);
                $startTime = Carbon::parse($kunjungan->waktu_mulai_pemeriksaan);
                return abs($startTime->diffInMinutes($appointmentTime));
            });

        // Hitung total kunjungan valid bulan lalu
        $countLastMonth = Kunjungan::whereNotNull('waktu_mulai_pemeriksaan')
            ->whereYear('tanggal_kunjungan', now()->subMonth()->year)
            ->whereMonth('tanggal_kunjungan', now()->subMonth()->month)
            ->count();

        $averageWaitTime = ($countThisMonth > 0) ? ($totalWaitTimeThisMonth / $countThisMonth) : 0;
        $averageWaitTimeLast = ($countLastMonth > 0) ? ($totalWaitTimeLastMonth / $countLastMonth) : 0;

        // Hitung persentase perubahan
        if ($averageWaitTimeLast > 0) {
            $percentage = round((($averageWaitTime - $averageWaitTimeLast) / $averageWaitTimeLast) * 100, 1);
        } else {
            $percentage = ($averageWaitTime > 0) ? 100 : 0;
        }

        // dd($percentage = round((($averageWaitTime - $averageWaitTimeLast) / $averageWaitTimeLast) * 100, 1));



        // Format waktu ke format m s
        $minutes = floor($averageWaitTime);
        $seconds = round(($averageWaitTime - $minutes) * 60);
        $formattedTime = "{$minutes}m {$seconds}s";

        $currentMonthName = now()->translatedFormat('F');
        $compareText = "dari bulan " . $currentMonthName;


        return response()->json([
            'average_time' => $formattedTime,
            'percentage' => $percentage,
            'compare_text' => $compareText
        ]);
    }

    public function getObatHabisCount()
    {
        // Hitung jumlah obat habis secara keseluruhan
        $totalObatHabis = DataObat::where('stok', 0)->count();

        return response()->json([
            'total_obat_habis' => $totalObatHabis
        ]);
    }


    public function getAverageApotekWaitTime()
    {
        $baseQuery = Kunjungan::query()
            ->join('rekam_medis', 'kunjungan.id_kunjungan', '=', 'rekam_medis.kunjungan_id')
            ->join('pembayaran', 'kunjungan.id_kunjungan', '=', 'pembayaran.kunjungan_id');



        // Hitung rata-rata waktu tunggu apotek bulan ini
        $averageTotal = (clone $baseQuery)
            ->whereYear('kunjungan.tanggal_kunjungan', now()->year)
            ->whereMonth('kunjungan.tanggal_kunjungan', now()->month)
            ->selectRaw('AVG(TIMESTAMPDIFF(SECOND, rekam_medis.waktu_resep_selesai, pembayaran.waktu_obat_diserahkan)) as average_seconds')
            ->value('average_seconds');

        // Hitung rata-rata waktu tunggu apotek bulan lalu
        $averageLast = (clone $baseQuery)
            ->whereYear('kunjungan.tanggal_kunjungan', now()->subMonth()->year)
            ->whereMonth('kunjungan.tanggal_kunjungan', now()->subMonth()->month)
            ->selectRaw('AVG(TIMESTAMPDIFF(SECOND, rekam_medis.waktu_resep_selesai, pembayaran.waktu_obat_diserahkan)) as average_seconds')
            ->value('average_seconds');

        $previousMonthName = now()->translatedFormat('F');
        $compareText = "dari bulan " . $previousMonthName;

        if ($averageLast > 0) {
            $percentage = round((($averageTotal - $averageLast) / $averageLast) * 100, 1);
        } else {
            $percentage = ($averageTotal > 0) ? 100 : 0;
        }

        // Konversi rata-rata detik ke format m s
        $minutes = floor(($averageTotal ?? 0) / 60);
        $seconds = floor(($averageTotal ?? 0) % 60);
        $formattedTime = "{$minutes}m {$seconds}s";

        return response()->json([
            'average_time' => $formattedTime,
            'percentage' => $percentage,
            'compare_text' => $compareText
        ]);
    }

    public function getDataKunjunganAntriCepat()
    {
        $data = Kunjungan::with('tenagaMedis', 'pasien')
            ->select([
                'waktu_mulai_pemeriksaan',
                'status',
                'pasien_id',
                'tenaga_medis_id'
            ])
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('nama', function ($kunjungan) {
                return $kunjungan->pasien->nama_lengkap ?? 'N/A';
            })

            ->addColumn('tenaga_medis', function ($kunjungan) {
                return $kunjungan->tenagaMedis->nama_lengkap ?? 'N/A';
            })

            ->addColumn('jadwal', function ($kunjungan) {
                return $kunjungan->waktu_mulai_pemeriksaan;
            })

            ->addColumn('status', function ($kunjungan) {
                return $kunjungan->status;
            })
            ->make(true);
    }

    public function getPendapatanBulanan()
    {
        $totalThisMonth = Pembayaran::whereYear('tanggal_pembayaran', now()->year)
            ->whereMonth('tanggal_pembayaran', now()->month)
            ->sum('total_biaya');

        // Hitung total pendapatan bulan lalu
        $totalLastMonth = Pembayaran::whereYear('tanggal_pembayaran', now()->subMonth()->year)
            ->whereMonth('tanggal_pembayaran', now()->subMonth()->month)
            ->sum('total_biaya');


        // Hitung persentase perubahan
        if ($totalLastMonth > 0) {
            $percentage = round((($totalThisMonth - $totalLastMonth) / $totalLastMonth) * 100, 1);
        } else {
            $percentage = ($totalThisMonth > 0) ? 100 : 0;
        }
        // dd($totalLastMonth, $totalThisMonth, $percentage);

        $currentMonthName = now()->translatedFormat('F');
        $compareText = "dari bulan " . $currentMonthName;

        return response()->json([
            'total' => $totalThisMonth,
            'percentage' => $percentage,
            'compare_text' => $compareText
        ]);
    }

    public function getPengeluaranBulanan()
    {
        $totalThisMonth = PembelianObat::whereYear('tanggal_pembelian', now()->year)
            ->whereMonth('tanggal_pembelian', now()->month)
            ->sum('total_harga');

        // Hitung total pengeluaran bulan lalu
        $totalLastMonth = PembelianObat::whereYear('tanggal_pembelian', now()->subMonth()->year)
            ->whereMonth('tanggal_pembelian', now()->subMonth()->month)
            ->sum('total_harga');

        // Hitung persentase perubahan
        if ($totalLastMonth > 0) {
            $percentage = round((($totalThisMonth - $totalLastMonth) / $totalLastMonth) * 100, 1);
        } else {
            $percentage = ($totalThisMonth > 0) ? 100 : 0;
        }
        // dd($totalLastMonth, $totalThisMonth, $percentage);
        $currentMonthName = now()->translatedFormat('F');
        $compareText = "dari bulan " . $currentMonthName;

        return response()->json([
            'total' => $totalThisMonth,
            'percentage' => $percentage,
            'compare_text' => $compareText
        ]);
    }
}
