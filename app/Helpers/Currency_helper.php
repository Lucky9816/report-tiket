<?php
 function usd_format($amount) {
    $formatted_amount = number_format($amount, 2, ',', '.');
    return $formatted_amount;
}