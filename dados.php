<?php

$nome = ($_POST['nome']);
$salariobruto = ($_POST['salariobruto']);
$descontoirrf = 0;
$descontoinss = 0;
$porcentageminss = 0;
$porcentagemirrf = 0;

if($salariobruto<=1045){
  $descontoinss = ($salariobruto/100)*7.5;

}
elseif($salariobruto>=1045.01&&$salariobruto<=2089.60){
  $descontoinss = ($salariobruto/100)*9;
}
elseif($salariobruto>=2089.61&&$salariobruto<=3134.40){
  $descontoinss = ($salariobruto/100)*12;
}
elseif($salariobruto>=3134.41&&$salariobruto<=6101.06){
  $descontoinss = ($salariobruto/100)*14;
}

$sobrainss = $salariobruto - $descontoinss;

if($sobrainss<=1903.98){
  $descontoirrf = 0;
  $porcentagemirrf = 0;
}
elseif($sobrainss>=1903.99&&$sobrainss<=2826.65){
  $descontoirrf = ($sobrainss*0.75)-142.80;
  $porcentagemirrf = 7.5;
}
elseif($sobrainss>=2826.66&&$sobrainss<=3751.05){
  $descontoirrf = ($sobrainss*0.15)-354.80;
  $porcentagemirrf = 15;
}
elseif($sobrainss>=3751.06&&$sobrainss<=4664.68){
  $descontoirrf = ($sobrainss*0.225)-636.13;
  $porcentagemirrf = 22.5;
}
elseif($sobrainss>4664.68){
  $descontoirrf = ($sobrainss*0.275)-869.36;
  $porcentagemirrf = 27.5;
}

$salarioliquido = $sobrainss - $descontoirrf;

?>
