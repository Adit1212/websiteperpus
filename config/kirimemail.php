<?php 
//kirim email dulu
$subjek= 'Tes Email Api';
$kepada= 'rinookta1427@gmail.com';
$dari= 'demo@rinocan.com';
$atasnama= 'Email Rinocan';
$isi= 'ini adalah tes email';
$url= 'http://apisendemail.rinocan.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
file_get_contents($url,true);
?>