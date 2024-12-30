<?php
function hak_akses_manajer_operasional()
{
    $session = session();
    $hak_akses = $session->get('hak_akses');
    if ($hak_akses != 0) {
        echo view('templates/no_akses'); 
        exit;
    }
}

function hak_akses_sales()
{
    $session = session();
    $hak_akses = $session->get('hak_akses');
    if ($hak_akses != 1) {
        echo view('templates/no_akses'); 
        exit;
    }
}

function hak_akses_admin()
{
    $session = session();
    $hak_akses = $session->get('hak_akses');
    if ($hak_akses != 2) {
        echo view('templates/no_akses'); 
        exit;
    }
}

function hak_akses_qc()
{
    $session = session();
    $hak_akses = $session->get('hak_akses');
    if ($hak_akses != 3) {
        echo view('templates/no_akses'); 
        exit;
    }
}

function hak_akses()
{
    $session = session();
    $hak_akses = $session->get('hak_akses');
    return $hak_akses;
}
