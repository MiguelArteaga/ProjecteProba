<html>
  <head>
    <title></title>
  </head>

  <body>
    <?php
    #Arrays que usaremos
    $arrayImg = array();
    $arrayGeneral = array();
    $arrayNombres = array();
    $Carac = array();
    $arraycaract=file('config.txt');
    $caractconfig=array();
    $caractconfig2=array();
    $caractimatges=array();
    $caractimatges2=array();

    #Lectura de fichero.
    $Img = fopen("imatges.txt", "r") or die("Error al leer documento.");
    while(!feof($Img)){
      $linea=fgets($Img);
      $saltodelinea=nl2br($linea);
      array_push($arrayImg, $saltodelinea);
    }
    fclose($Img);

    # Añadimos el fichero en un array
    foreach ($arrayImg as $key => $i) {
      $names = explode(":",$i);
      array_push($arrayGeneral, $names);
    }
    
    # Creacion de array nombres
    $longGnl = count($arrayGeneral);
    for($i = 0; $i<$longGnl;$i++){
      array_push($arrayNombres, $arrayGeneral[$i][0]);
    }
    # Creacion de array caracteristicas
    for($i=0;$i<$longGnl;$i++){
      array_push($Carac, $arrayGeneral[$i][1]);
    }
    
    
    
    $errorcaract=true;

    #Añadimos las caracteristicas del fichero config.txt a un array
    foreach ($arraycaract as $i ) {
      $names = explode(":",$i);
      array_push($caractconfig, $names);
    }

    #Añadimos las caracteristicas del fichero imatges.txt a un array
    
    foreach($arrayGeneral as $u) {
      array_push($caractimatges,$u[1] );
      
    }

    foreach ($caractimatges as $value) {
    	$names = explode(" ",$value);
    	array_push($caractimatges2,$names);
    }

    foreach ($caractconfig as $value) {
    	$names = explode(" ",$value);
    	array_push($caractconfig2,$names);
    }

    

    $longCaractimatges2=count($caractimatges2);

    for ($i=0; $i < $longCaractimatges2; $i++) { 
    	if ($caractimatges2[$i][0]!=$caractconfig[0][0]){
    		$errorcaract=false;

    	}
    	elseif ($caractimatges2[$i][3]!=$caractconfig[1][0]) {
    		$errorcaract=false;
    	}
    	elseif ($caractimatges2[$i][6]!=$caractconfig[2][0]) {
    		$errorcaract=false;
    	}

    }
  
    # 1. Una misma imagen (nombre de imagen) aparece dos veces en el archivo img.txt

    if(count($arrayNombres)>count(array_unique($arrayNombres))){
      $Logs = fopen("logs.txt", "w");
      fwrite($Logs, "¡Error! Hay un nombre repetido en el archivo imatges.txt.");
      fclose($Logs);
      echo"<h2>¡Error! Hay un nombre repetido en el archivo imatges.txt.</h2>";
    }elseif(count($Carac)>count(array_unique($Carac))){
      $Log = fopen("logs.txt", "w");
      fwrite($Log, "¡Error! Hay caracteristicas repetidas en el archivo imatges.txt.");
      fclose($Log);
      echo"<h2>¡Error! Hay caracteristicas repetidas en el archivo imatges.txt.</h2>";
    }elseif($errorcaract==false){
      $Log = fopen("logs.txt", "w");
      fwrite($Log, "¡Error! Hay caracteristicas que no estan en el archivo config.txt.");
      fclose($Log);
      echo"<h2>¡Error! Hay caracteristicas que no estan en el archivo config.txt.</h2>";

    }
    else{
    
    $arrayRandom=[];

    $numeros=range(0,11);
    shuffle($numeros);
    foreach ($numeros as $value) {
      array_push($arrayRandom,$value);
    }
    $arrayGeneral2=[];
    foreach ($numeros as $value) {
      array_push($arrayGeneral2, $arrayGeneral[$value][0]);
    }
    echo"<link href='estilos-quien-es-quien.css' type='text/css' rel='stylesheet' >";
    $cartaoculta = $arrayGeneral2[0];
    $img = $arrayGeneral2;
    $div = ['div1','div2','div3','div4','div5','div6','div7','div8','div9','div10','div11'];
    
    echo "<table>";
    $i=0;
    foreach ($img as $fotos) {
      if( substr($fotos,-3)=="jpg" or substr($fotos,-3)=="png" or substr($fotos,-4)=="jpeg"){
        if ($cartaoculta!=$fotos){
          echo "<div class=$div[$i]>";
          echo "<img src='imagenes/$fotos' width='120' height='120'>";
          echo "</div>";
          $i=$i+1;
        }else{
          echo "<div class='divoculta'>";
          echo "<img src='imagenes/$fotos' width='150' height='150'>";
          echo "</div>";
        }
    }
    }
    }
    ?>
    <form action="#" method="post">
      <div class="general">
      <div class="caja1">
        <p id="cabello">Cabello</p>
        <select name="OptCabello[]">
          <option value="Seleciona">Selecciona</option>
          <option value="Rubio">Rubio</option>
          <option value="Moreno">Moreno</option>
          <option value="Castany">Castany</option>
        </select>
      </div>
      <div class="caja2">
        <p id="gafas">Gafas</p>
        <select name="OptGafas[]">
          <option value="Seleciona">Selecciona</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>
      <div class="caja3">
        <p id="sexe">Sexo</p>
        <select name="OptSexo[]">
          <option value="Seleciona">Selecciona</option>
          <option value="Hombre">Hombre</option>
          <option value="Mujer">Mujer</option>
        </select>
      </div>
    </div>
    </form>
    <div class="boton">
    <input type="submit" name="enviar" value="Enviar"/>
    </div>

  </div>
  </body>
</html>
