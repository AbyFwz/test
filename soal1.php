<?php
// Sort data berdasarkan tanggal
// Iterasi saldo awal sesuai dengan data keluar dan masuk saldo
// Soal section
$saldoawal = 100000;
$mutasi = array(
    (object)[
        "tanggal" => "2021-10-01",
        "masuk" => 200000,
        "keluar" => 0,
        "saldo" => 0
    ],
    (object)[
        "tanggal" => "2021-10-03",
        "masuk" => 300000,
        "keluar" => 0,
        "saldo" => 0
    ],
    (object)[
        "tanggal" => "2021-10-05",
        "masuk" => 150000,
        "keluar" => 0,
        "saldo" => 0
    ],
    (object)[
        "tanggal" => "2021-10-02",
        "masuk" => 0,
        "keluar" => 100000,
        "saldo" => 0
    ],
    (object)[
        "tanggal" => "2021-10-04",
        "masuk" => 0,
        "keluar" => 150000,
        "saldo" => 0
    ],
    (object)[
        "tanggal" => "2021-10-06",
        "masuk" => 0,
        "keluar" => 50000,
        "saldo" => 0
    ]
);

// Code section

// Sorting data berdasarkan tanggal
usort($mutasi, fn ($a, $b) => strcmp($a->tanggal, $b->tanggal));

// Mengubah value pada key saldo sesuai dengan mutasi ditambah dengan saldoawal
foreach ($mutasi as $data) {
    if ($data->masuk != 0 && $data->keluar == 0) {
        $saldoawal += $data->masuk;
        $data->saldo = $saldoawal;
    } else if ($data->keluar != 0 && $data->masuk == 0) {
        $saldoawal -= $data->keluar;
        $data->saldo = $saldoawal;
    } else {
        $saldoawal += $data->masuk;
        $data->saldo = $saldoawal;
        $saldoawal -= $data->keluar;
        $data->saldo = $saldoawal;
    }
}

// Output section
echo "<pre>";
print_r($mutasi);
