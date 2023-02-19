const items = document.getElementById( 'items')
const card = document.getElementById('card').content
const items2 = document.getElementById('items2')
const footerItems = document.getElementById('footer-items') //datos donde ira total
const tempateFooter= document.getElementById('tempate-footer').content//total
const tempateCarrtio = document.getElementById('tempate-carrito').content
const fragment = document.createDocumentFragment ()

let carrito = {}

document.addEventListener('DOMContentLoaded', () => {
    ferchData()
    if(localStorage.getItem('carrito')){
        carrito = JSON.parse(localStorage.getItem('carrito'))
        pintarCarrito()
    }
})

items.addEventListener('click', e => {
    addCarrito(e)
})

items2.addEventListener('click', e => {
    btnAccion(e)
})


const ferchData = async () =>{
    try{
        const res = await fetch('menu.json')
        const data = await res.json()
        
        pintarCards(data)
    }catch(error){
        console.log(error)
    }
}

const pintarCards = data => {
    data.forEach(producto =>{
        card.querySelector('img').setAttribute("src", producto.img)
        card.querySelector('h2').textContent = producto.nombre
        card.querySelector('h3').textContent = producto.precio
        card.querySelector('span').textContent = producto.descripcion
        card.querySelector('.bi-cart3').dataset.id = producto.id
        

        const clone = card.cloneNode(true)
        fragment.appendChild(clone)
    })
    items.appendChild(fragment)

    
}

const addCarrito = e => {
  

    if(e.target.classList.contains('bi-cart3')){
        setCarrito(e.target.parentElement)
    }
    e.stopPropagation()
}

const setCarrito = objeto => {
    const producto = {
            id: objeto.querySelector('.bi-cart3').dataset.id,
            nombre: objeto.querySelector('.product_title').textContent,
            precio: objeto.querySelector('.product_price_1').textContent,
            img: objeto.querySelector('.product_img').src,
            cantidad: 1 
    }

    if(carrito.hasOwnProperty(producto.id)){
        producto.cantidad = carrito[producto.id].cantidad + 1
    }
    
    carrito[producto.id] = {...producto}
    pintarCarrito()
    
}

const pintarCarrito = () => {
    items2.innerHTML = ``
    Object.values(carrito).forEach(producto =>{
        tempateCarrtio.querySelector('img').setAttribute("src", producto.img)
        tempateCarrtio.querySelectorAll('th')[1].textContent = producto.nombre
        tempateCarrtio.querySelectorAll('th')[2].textContent = "$ " + producto.cantidad * producto.precio
        tempateCarrtio.querySelector('h3').textContent = producto.cantidad
        tempateCarrtio.querySelector('.front_2').dataset.id = producto.id
        tempateCarrtio.querySelector('.front_1').dataset.id = producto.id
        tempateCarrtio.querySelector('.front').dataset.id = producto.id

        const clone = tempateCarrtio.cloneNode(true)
        fragment.appendChild(clone)

    })
    items2.appendChild(fragment)
    
    pintarFooter()

    localStorage.setItem('carrito',JSON.stringify(carrito))

}


const pintarFooter = () => {
    footerItems.innerHTML = ``
    if(Object.keys(carrito).length === 0){
        //footerItems.innerHTML = `
        //<th><h3 class="Total_cart">Carrito Vacío</h3>
       // `
        return
    }
  
    const nPrecio = Object.values(carrito).reduce((acc,{cantidad, precio})=> acc + cantidad * precio,0)
    

    tempateFooter.querySelector('h3') .textContent = "total: " + nPrecio
    const clone = tempateFooter.cloneNode(true)
    fragment.appendChild(clone)
    footerItems.appendChild(fragment)



}
const btnAccion = e =>{
    console.log(e.target)
    
    if(e.target.classList.contains('front_2')){
        

        const producto = carrito[e.target.dataset.id]
        producto.cantidad ++
        carrito[e.target.dataset.id] = {...producto}
        pintarCarrito()
    }

    if(e.target.classList.contains('front_1')){
        const producto = carrito[e.target.dataset.id]
        producto.cantidad --
        if(producto.cantidad === 0){
            delete carrito[e.target.dataset.id]
        }
        pintarCarrito()
    }

    if(e.target.classList.contains('front')){

        const producto = carrito[e.target.dataset.id]
        producto.cantidad = carrito[e.target.dataset.id].cantidad * 0
        
        if(producto.cantidad === 0){
            delete carrito[e.target.dataset.id]
        }
        pintarCarrito()
    }

    e.stopPropagation()

}


