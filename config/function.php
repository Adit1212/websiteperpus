<?php 
function anti_injection($data){
  $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));

  return $filter;

}
function selisih($CheckIn,$CheckOut){
  $CheckInX = explode("-", $CheckIn);
  $CheckOutX =  explode("-", $CheckOut);
  $date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
  $date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
  $interval =($date2 - $date1)/(3600*24);
  // returns numberofdays
  return  $interval ;
}
function statusbook($status){
  if($status=='pending'){
    $sta= '<span class="label label-danger" style="text-transform: uppercase;">pending</span>';
  }
  else if($status=='sukses'){
    $sta= '<span class="label label-success" style="text-transform: uppercase;">sukses</span>';
  }
  else if($status=='dipinjam'){
    $sta= '<span class="label label-default" style="text-transform: uppercase;">dipinjam</span>';
  }
  else if($status=='kembali'){
    $sta= '<span class="label label-primary" style="text-transform: uppercase;">kembali</span>';
  }
  else{
    $sta= '';
  }
  return $sta;
}
function random($length){
  //$data='1234567890AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSstuuUvVwWxXyYyZz';
  $data= '123456789123456789123456789123456789';
  $string='';
  for($i=1;$i<=$length;$i++){
    $pos=rand(0,strlen($data)-1);
    $string.=$data{$pos};
  }
  return $string;
}
function randomkar($length){
  $data='1234567890AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSstuuUvVwWxXyYyZz';
  //$data= '123456789123456789123456789123456789';
  $string='';
  for($i=1;$i<=$length;$i++){
    $pos=rand(0,strlen($data)-1);
    $string.=$data{$pos};
  }
  return $string;
}
//end rumus
function dmy($dmy){
  $re= date('d-m-Y',strtotime($dmy));
  return $re;
}
function ymd($ymd){
  $re= date('Y-m-d',strtotime($ymd));
  return $re;
}
function dmywaktu($date){  
  $date = strtotime($date);
  $dmy= date('d-m-Y',$date);
  $waktu = date('H:i',$date);
  $result = $dmy.' | '.$waktu;       
  return($result);  
}
function koma($nilai){
  return number_format($nilai,2);
}
function predikattambahan($nilai,$sl){
  if($nilai>0){
    if($sl==75){
      if($nilai>=93 and $nilai<=100){
        $predikattambahan='A';
      }
      else if($nilai>=84 and $nilai<93){
        $predikattambahan='B';
      }
      else if($nilai>=75 and $nilai<84){
        $predikattambahan='B';
      }
      else if($nilai<75){
        $predikattambahan='D';
      }
      else{
        $predikattambahan='-';
      }
    }
    else if($sl==80){
      if($nilai>=96 and $nilai<=100){
        $predikattambahan='A';
      }
      else if($nilai>=88 and $nilai<96){
        $predikattambahan='B';
      }
      else if($nilai>=80 and $nilai<88){
        $predikattambahan='B';
      }
      else if($nilai<80){
        $predikattambahan='D';
      }
      else{
        $predikattambahan='-';
      }
    }
    return $predikattambahan;
  }
  else{
    $predikattambahan='-';
    return $predikattambahan;
  }
}
function predikat($nilai){
  if($nilai>=90 and $nilai<=100){
    $predikat='A';
  }
  else if($nilai>=80 and $nilai<=89){
    $predikat='B+';
  }
  else if($nilai>=70 and $nilai<=79){
    $predikat='B';
  }
  else if($nilai>=41 and $nilai<=69){
    $predikat='C';
  }
  else if($nilai>0 and $nilai<=40){
    $predikat='D';
  }
  else{$predikat='-';}
  return $predikat;
}
function romawi($n){
  $iromawi = array("","I","II","III","IV","V","VI","VII","VIII","IX","X",20=>"XX",30=>"XXX",40=>"XL",50=>"L",
  60=>"LX",70=>"LXX",80=>"LXXX",90=>"XC",100=>"C",200=>"CC",300=>"CCC",400=>"CD",500=>"D",600=>"DC",700=>"DCC",
  800=>"DCCC",900=>"CM",1000=>"M",2000=>"MM",3000=>"MMM");
  if(array_key_exists($n,$iromawi)){
  $hasil = $iromawi[$n];
  }elseif($n >= 11 && $n <= 99){
  $i = $n % 10;
  $hasil = $iromawi[$n-$i] . Romawi($n % 10);
  }elseif($n >= 101 && $n <= 999){
  $i = $n % 100;
  $hasil = $iromawi[$n-$i] . Romawi($n % 100);
  }else{
  $i = $n % 1000;
  $hasil = $iromawi[$n-$i] . Romawi($n % 1000);
  }
  return $hasil;
}
function rp($str){
    $jum = strlen($str);
    $jumtitik = ceil($jum/3);
    $balik = strrev($str);
    
    $awal = 0;
    $akhir = 3;
    for($x=0;$x<$jumtitik;$x++){
      $a[$x] = substr($balik,$awal,$akhir)."."; 
      $awal+=3;
    }
    $hasil = implode($a);
    $hasilakhir = strrev($hasil);
    $hasilakhir = substr($hasilakhir,1,$jum+$jumtitik);
          
    return "".$hasilakhir."";
}
function tgl($date){  
  $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
  $date = strtotime($date);
  $tanggal = date ('j', $date);
  $bulan = $array_bulan[date('n',$date)];
  $tahun = date('Y',$date); 
  $result = $tanggal ." ". $bulan ." ". $tahun;       
  return($result);  
}
function bulan($bulan){
  if($bulan=='01'){$namabulan="Januari";}
  elseif($bulan=='01'){$namabulan="Januari";}
  elseif($bulan=='02'){$namabulan="Februari";}
  elseif($bulan=='03'){$namabulan="Maret";}
  elseif($bulan=='04'){$namabulan="April";}
  elseif($bulan=='05'){$namabulan="Mei";}
  elseif($bulan=='06'){$namabulan="Juni";}
  elseif($bulan=='07'){$namabulan="Juli";}
  elseif($bulan=='08'){$namabulan="Agustus";}
  elseif($bulan=='09'){$namabulan="September";}
  elseif($bulan=='10'){$namabulan="Oktober";}
  elseif($bulan=='11'){$namabulan="November";}
  elseif($bulan=='12'){$namabulan="Desember";}
  return($namabulan);
}
function hari($hari){
  $daftar_hari = array( 'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
  $hariini = date('l', strtotime($hari)); 
  return $daftar_hari[$hariini];
}
function h($h){
  if($h=='1'){$hr='Senin';}
  elseif($h=='2'){$hr='Selasa';}
  elseif($h=='3'){$hr='Rabu';}
  elseif($h=='4'){$hr='Kamis';}
  elseif($h=='5'){$hr='Jumat';}
  elseif($h=='6'){$hr='Sabtu';}
  elseif($h=='7'){$hr='Minggu';}
  return $hr;
}
function l($linku){
  $l=substr(md5($linku), 0,9);
  return $l;
}
?>