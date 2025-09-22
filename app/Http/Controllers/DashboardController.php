<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pasien;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $title = 'Dashboard';
        $subTitle = 'Royal Prima';

        $jenisKunjungan = Kunjungan::select('jenis_kunjungan')->distinct()->get();
        $tipePasien = Kunjungan::select('tipe_pasien')->distinct()->get();

        // Mengirim semua data ke view dashboard
        return view('dashboard', compact(
            'jenisKunjungan',
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

        // dd($formattedTime, $percentage, $compareText);

        return response()->json([
            'average_time' => $formattedTime,
            'percentage' => $percentage,
            'compare_text' => $compareText
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
                return $startTime->diffInMinutes($appointmentTime);
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
                return $startTime->diffInMinutes($appointmentTime);
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
}
