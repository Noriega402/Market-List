let total = 0
let datos = [
    { nombre: "Harina de Trigo", precio: 29.3 },
    { nombre: "Pastel Mora Azul", precio: 45.6 },
    { nombre: "Pastel 3 Leches", precio: 89.9 },
    { nombre: "Leche Suli", precio: 15.2 },
    { nombre: "Levadura Sol", precio: 24.4 },
    { nombre: "Leche Lala", precio: 13.5 },
    { nombre: "Cup Cakes", precio: 34.6 },
    { nombre: "Bolsa Pan Dulce", precio: 19.8 },
    { nombre: "Toppings Mixtos", precio: 22.67 },
    { nombre: "Pack Canelones", precio: 35.2 },
    { nombre: "Pastel Zanahoria", precio: 134.7 },
    { nombre: "Pie Queso", precio: 67.3},
];

$(window).on('load',function(){
    agregarProducto()
});

$('body').on('click','#btn-compra',function(){
    // let compra = $(this).attr('value')
    // console.log(compra);
    let nombre = $(this).attr('producto')
    let precio = $(this).attr('precio')

    let data = [nombre,precio]
    total = total+parseFloat(precio)

    let num_ventas = $('#info').children().length
    // console.log('articulos en venta: ' + num_ventas);

    let infoProd = `<p class="col-12">${data[0]} | ${data[1]}</p>`

    let infoPrecio = `<h5 class="col-6"><b>Total: </h5>
                    <h5 class="col-6">${total.toFixed(2)}</b></h5>`

    let info_num = `<h6><b>Num. Articulos:  ${num_ventas+1} </b></h6>`


    $('#info').append(infoProd)
    $('.num-articulos').html(info_num)
    $('.total').html(infoPrecio)
});

function agregarProducto(){
    for (let i=0; i<datos.length; i++) {
        let card = `<div class="card m-1" style="width: 7.5rem; height: 300px; >">
        <img src="./img/producto.svg" class="card-img-top" alt="...">
            <div class="card-body">
                <h6 class="card-title text-justify">${datos[i].nombre}</h6>
                <p class="card-text">Q ${datos[i].precio}</p>
                <div class="container">
                    <div class="row">
                        <button class="btn btn-success btn-sm row" value="${i}" id="btn-compra" producto="${datos[i].nombre}" precio="${datos[i].precio}" ><i class="fas fa-shopping-basket"></i> Comprar</button>
                    </div>
                </div>
            </div>
        </div>`
        $('#left').append(card)
    }
};