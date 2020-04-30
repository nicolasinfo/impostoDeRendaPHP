<DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="form">

<div class="nomesalario">

<h3 id="title">Calcule seu salário líquido</h3>

<form action="index.php" method="POST">
<input class="inf" type="text" name="nome" id="nome" placeholder="Insira seu nome"><br>
<input class="inf" type="number" name="salariobruto" id="salariobruto" placeholder="Insira seu salário bruto"><br>
<input class="inf" type="submit" value="Salvar" name="salvar">
</form>
</div>

</section>

<h2 id="info" class="info">INFORMAÇÕES</h2>
<div id="dados">

<?php

if(isset($_POST['salvar'])){
    $nome = $_POST['nome'];
    $salariobruto = $_POST['salariobruto'];
    $descontoinss = 0;
    $descontoirrf = 0;
    $porcentagemirrf = 0;
    $salarioliquido = 0;

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


$arquivo = 'infos.txt.txt';
$tamanhoArquivo = filesize($arquivo);
$arquivoAberto = fopen($arquivo, 'a');
fwrite($arquivoAberto, "Nome: ".$nome."  |• ");
fwrite($arquivoAberto, "Salário Bruto: R$".$salariobruto."  |• ");
fwrite($arquivoAberto, "Desconto do inss: R$".$descontoinss."  |• ");
fwrite($arquivoAberto, "Desoconto irrf: R$".$descontoirrf."  |• ");
fwrite($arquivoAberto, "Salário Líquido: R$".$salarioliquido." •\r\n");
fclose($arquivoAberto);
}

?>


                  <?php
                    if(isset($_POST['salvar'])){
                        $dados = file_get_contents("infos.txt.txt");
                        $dadosseparados = explode('•', $dados);
                        foreach($dadosseparados as $key => $value){
                            if(!(($key+1) %5 == 0)){
                                echo($value);
                            }else{
                                echo($value."<br>");
                            }

                        }

                    }

                ?>

</div>
</body>
</html>
