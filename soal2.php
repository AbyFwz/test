<?php
// Soal section
$saldoAwalStok = 0;
$saldoAwalStokRp = 0;
$kartuStok = array(
    (object)[
        "tanggal" => "2021-10-01",
        "masuk" => 10,
        "keluar" => 0,
        "saldoQty" => 0,
        "masukRp" => 10000,
        "keluarRp" => 0,
        "saldoRp" => 0
    ],
    (object)[
        "tanggal" => "2021-10-03",
        "masuk" => 45,
        "keluar" => 0,
        "saldoQty" => 0,
        "masukRp" => 36000,
        "keluarRp" => 0,
        "saldoRp" => 0
    ],
    (object)[
        "tanggal" => "2021-10-05",
        "masuk" => 40,
        "keluar" => 0,
        "saldoQty" => 0,
        "masukRp" => 35000,
        "keluarRp" => 0,
        "saldoRp" => 0
    ],
    (object)[
        "tanggal" => "2021-10-02",
        "masuk" => 0,
        "keluar" => 5,
        "saldoQty" => 0,
        "masukRp" => 0,
        "keluarRp" => 0,
        "saldoRp" => 0
    ],
    (object)[
        "tanggal" => "2021-10-04",
        "masuk" => 0,
        "keluar" => 40,
        "saldoQty" => 0,
        "masukRp" => 0,
        "keluarRp" => 0,
        "saldoRp" => 0
    ],
    (object)[
        "tanggal" => "2021-10-06",
        "masuk" => 0,
        "keluar" => 35,
        "saldoQty" => 0,
        "masukRp" => 0,
        "keluarRp" => 0,
        "saldoRp" => 0
    ],
);

// Code section
// Sort data berdasarkan tanggal
usort($kartuStok, fn ($a, $b) => strcmp($a->tanggal, $b->tanggal));

// KeluarRp = SaldoRp[i-1]/SaldoQty[i-1]*KeluarQty[i]
foreach ($kartuStok as $data) {
    if ($data->masuk != 0 && $data->keluar == 0) {
        $data->saldoQty = $data->masuk + $saldoAwalStok;
        $data->saldoRp = $data->masukRp + $saldoAwalStokRp;
        $saldoAwalStok = $data->saldoQty;
        $saldoAwalStokRp = $data->saldoRp;
    } else if ($data->keluar != 0 && $data->masuk == 0) {
        $data->keluarRp = $saldoAwalStokRp / $saldoAwalStok * $data->keluar;
        $data->saldoQty = $saldoAwalStok - $data->keluar;
        $data->saldoRp = $saldoAwalStokRp - $data->keluarRp;
        $saldoAwalStok = $data->saldoQty;
        $saldoAwalStokRp = $data->saldoRp;
    } else {
        // Hitung data masuk
        $data->saldoQty = $data->masuk + $saldoAwalStok;
        $data->saldoRp = $data->masukRp + $saldoAwalStokRp;
        // Hitung data keluar
        $data->keluarRp = $saldoAwalStokRp / $saldoAwalStok * $data->keluar;
        $data->saldoQty = $saldoAwalStok - $data->keluar;
        $data->saldoRp = $saldoAwalStokRp - $data->keluarRp;
        // Perubahan data pada global variabel
        $saldoAwalStok = $data->saldoQty;
        $saldoAwalStokRp = $data->saldoRp;
    }
}

// Output section
echo "<pre>";
print_r($kartuStok);
