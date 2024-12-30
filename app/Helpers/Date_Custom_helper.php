<?php
function indo_date($date)
{
    $date_f = date_create($date);
    return date_format($date_f, "d/m/Y");
}
function apps_date($date)
{
    $date_f = date_create($date);
    echo date_format($date_f, "j F Y");
}
function mysql_date($date)
{
    $date_f = date_create($date);
    return date_format($date_f, "Y-m-d");
}

function mysql2_date($date)
{
    // Konversi dari format DD/MM/YYYY ke DateTime
    $date_f = date_create_from_format('d/m/Y', $date);
    if ($date_f === false) {
        return null; // Kembalikan null jika format tidak valid
    }
    return date_format($date_f, "Y-m-d");
}

function english_date($date)
{
    $date_f = date_create($date);
    if (!$date_f) {
        return "Invalid date";
    }

    $day = date_format($date_f, "j"); // Get the day of the month without leading zeros
    $day_suffix = get_day_suffix($day); // Get the appropriate suffix for the day
    return date_format($date_f, "F") . " " . $day . $day_suffix . ", " . date_format($date_f, "Y");
}

function get_day_suffix($day)
{
    if (!in_array(($day % 100), array(11, 12, 13))) {
        switch ($day % 10) {
            case 1: return "st";
            case 2: return "nd";
            case 3: return "rd";
        }
    }
    return "th";
}

function format_indo($datetime)
{
    // Pecah datetime menjadi bagian tanggal dan waktu
    $date = explode(' ', $datetime)[0];
    $time = explode(' ', $datetime)[1];

    // Pecah tanggal menjadi hari, bulan, tahun
    $tanggal = explode('-', $date);
    $tahun = $tanggal[0];
    $bulan = $tanggal[1];
    $hari = $tanggal[2];

    // Gabungkan menjadi format yang diinginkan
    return "$hari/$bulan/$tahun $time";
}

