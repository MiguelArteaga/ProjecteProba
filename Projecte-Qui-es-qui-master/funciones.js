
arrayNombreCartas=[];
function girar(id){
	document.getElementById(id).addEventListener('click',girarcarta);
	girarcarta(id);


}


function girarcarta(id2){
	document.getElementById(id2).classList.add('flipped');
	

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

	document.getElementById('p3prova').innerHTML=CartaOculta;
	girarcarta('id13');
	if(UltimaCarta==CartaOculta){
		document.getElementById('p1prova').innerHTML="Has Ganado";

	}
	else if(UltimaCarta!=CartaOculta) {
		document.getElementById('p1prova').innerHTML="Has Perdido";

	}
	document.getElementById('p2prova').innerHTML=UltimaCarta;

}

