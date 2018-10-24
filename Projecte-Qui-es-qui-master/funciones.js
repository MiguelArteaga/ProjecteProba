
arrayNombreCartas=[];
var sonidocarta= new Audio('sonido/mariosalto.mp3');

function girar(id){
	document.getElementById(id).addEventListener('click',girarcarta);
	girarcarta(id);


}


function girarcarta(id2){
	document.getElementById('botoneasy').disabled=true;
	document.getElementById(id2).classList.add('flipped');
	sonidocarta.play();
	

}

function nombreCartas(id){
	arrayNombreCartas.push(id);
	if (arrayNombreCartas.length==11){
		finalJuego();
	}
}

function finalJuego(){
	for (i=0;i<=arrayNombreCartas.length;i++){
		for (u=0; u<=arrayNombresCartas2.length;u++){
			if (arrayNombresCartas2[u]==arrayNombreCartas[i]){
				delete arrayNombresCartas2[u];

			}

		}
		
	}

	
	var UltimaCarta=arrayNombresCartas2.filter(Boolean);

	
	girarcarta('id13');
	if(UltimaCarta==CartaOculta){
		document.getElementById('p1prova').innerHTML="HAS GANADO!";
	

	}
	else if(UltimaCarta!=CartaOculta) {
		document.getElementById('p1prova').innerHTML="HAS PERDIDO!";
		

	}
	
}
function validarPregunta(){
  var selectCabello = document.getElementById("OptCabello");
  var selectGafas = document.getElementById("OptGafas");
  var selectSexo = document.getElementById("OptSexo");
  if(selectCabello.value ==0 && selectGafas.value==0 && selectSexo.value==0){
    document.getElementById("mensajeError").innerText = "¡Selecciona al menos una pregunta!";
  }
  if(selectCabello.value!=0 && selectGafas.value!=0 || selectGafas.value!=0 && selectSexo.value!=0 || selectSexo.value!=0 && selectCabello.value!=0){
    document.getElementById("mensajeError").innerText = "No puedes usar más de un pregunta a la vez.";
    document.getElementById('OptCabello').value = 0;
    document.getElementById('OptGafas').value = 0;
    document.getElementById('OptSexo').value = 0;
  }
}













