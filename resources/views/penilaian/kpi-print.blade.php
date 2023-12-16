<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Hasil KPI</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .print-section {
            margin-bottom: 50px;
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    @foreach ($data as $item)
    <div class="print-section">
        <strong>{{ $item['nama'] }}</strong><p>{{ $item['job'] }}, {{ $item['jabatan'] }}</p>
        <table>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggung Jawab Pekerjaan</th>
                    <th scope="col">Key Performance Indikator</th>
                    <th scope="col">Bobot</th>
                    <th scope="col">Target</th>
                    <th scope="col">Realisasi</th>
                    <th scope="col">Score</th>
                    <th scope="col">Nilai Akhir</th>
                    <th scope="col">Sumber Dokumen Penilaian</th>
                </tr>
            </thead>
            <tbody>
                @php($no = 1)
                @foreach ($item['kpi'] as $kpiItem)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $kpiItem->tanggung_jawab_pekerjaan }}</td>
                    <td>{{ $kpiItem->key_performance_indikator }}</td>
                    <td>{{ $kpiItem->bobot }}</td>
                    <td>{{ $kpiItem->target }}</td>
                    <td>{{ $kpiItem->realisasi }}</td>
                    <td>{{ $kpiItem->score }}</td>
                    <td>{{ $kpiItem->nilai_akhir }}</td>
                    <td><a href="{{ asset('img/'.$kpiItem->sumber) }}" target="_blank">{{ $kpiItem->sumber }}</a></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">Total Bobot</td>
                    <td>{{ $item['totalBobot'] }}</td>
                    <td colspan="3">Total Nilai Akhir</td>
                    <td colspan="2">{{ $item['totalNilaiAkhir'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach

    <script>
        // Mengeksekusi perintah print saat halaman dimuat
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
