<?php
function hak_akses_define($hak_akses)
{
    if ($hak_akses == 1) {
        echo "Admin";
    } else if ($hak_akses == 2) {
        echo "Petugas";
    } 
}
