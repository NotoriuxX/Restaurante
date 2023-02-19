
document.querySelector('#btn').addEventListener('click', traerDatos);
function traerDatos(){
	const xhttp =new XMLHttpRequest();

	xhttp.open('GET', 'catalogo.json', true);
	xhttp.send();
	xhttp.onreadystatechange = function (){
		if(this.readyState == 4 && this.status == 200){
			
			let datos = JSON.parse(this.responseText);
			
			let res = document.querySelector('#res');
			res.innerHTML='';

			for(let item of datos){
				res.innerHTML += `
			<tr>
			<td scope="row">${item.id}</td>
			<td>${item.Nombre_de_Usuario}</td>
			<td>${item.Platos_pedidos}</td>
			<td>${item.Total}</td>
			<td>${item.Ubicacion}</td>
			<td>${item.Numero}</td>
			<td>

				<button type="button" class="btn btn-danger btn-xs dt-delete" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px;">
				<i class="bi bi-check-lg"></i
				</button>
			</td>
		</tr>
		
			`	
			}
			addLocalStrage()
		}
		
	}
	
}
function addLocalStrage(){
    localStorage.setItem('carrito',JSON.stringify(traerDatos))
	
}



window.onload= function(){
    const storage = JSON.stringify(localStorage.getItem('carrito'));
    if(storage){
        carrito = storage;
		traerDatos()
       
    }

}









