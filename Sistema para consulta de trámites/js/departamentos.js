let items = document.querySelectorAll("#pagination-1");
let h3 = document.getElementById('tituloRequisito');
let requisotos = document.getElementById('requisitos');
let btnImprimir  = document.getElementById("aux__imprimir");
let btnHome  = document.getElementById("btnHome");

let titulo = '';
let req = [];


function alert(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Algo salió mal!',
        footer: '<p>Selecione un trámite antes de imprimir</p>'
    })
}

function alertaInfoNoFound(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Algo salió mal!',
        footer: '<p>No se ha encontrado información del trámite</p>'
    })
}

//Boton imprimir
btnImprimir.addEventListener("click", () =>{
    //console.log("title"+titulo);
    var auxTitulo = document.getElementById('titulo').innerHTML;
    //console.log("main "+auxTitulo);
    if( titulo == "" || titulo == null ){
        alert();
    }else if(verificador==false){
        alertaInfoNoFound();
    }else{
        window.open("../Departamentos/Reportes/ReportesDepartamentos.php?t="+titulo+"&tt="+auxTitulo,"_blank");
    }
    titulo="";
});

//boton inicio / botton home
btnHome.addEventListener("click", () =>{
    window.location.href = "../index.php";
});

let verificador = true;

function sendData( valor ){
    let url = '../Querys/ListadoRequerimientos.php';
    let requisitos = document.getElementById('requisitos');
    let formaData = new FormData();
    //console.log(`el valor es ${valor}`);
    formaData.append('dato', valor);
    fetch( url, {
        method:'POST',
        body: formaData
    } ).then( response => response.json() )
        .then ( data =>{
            //console.log(data);
            if( data == "" ){
                verificador = false;
                requisitos.innerHTML = "No se encontro información al respecto...";
            }else{
                verificador = true;
                requisitos.innerHTML = data;
            }
    } ) 
}
    
    function tituloDinamico(e){
        let tr = e.target.getAttribute('id');
        titulo = tr; 
        //console.log(tr);
        if( tr == "" ){
            tr = "Requisitos";
        }else{
            h3.innerHTML = tr;
        }
        sendData(titulo);
    }

    items.forEach( (tr)=>{
        tr.addEventListener( "click", tituloDinamico );
    } );


    window.addEventListener( 'load', ()=>{
    });


    //metodo para el buscador like -> no se usa, a su vez se usa jquery table 
    function getData(){
        //let letra = document.getElementById('form1').value;
        let letra = 'A';
        let contenido = document.getElementById('pagination-1');

        console.log(letra);
        let url = '../Querys/modules/RequisitosSecretariaTecnica.php';
        let formaData = new FormData();
        formaData.append('tramite', letra);
        fetch( url, {
                method:'POST',
                body: formaData
            } ).then( response => response.json() )
                .then ( data =>{
                console.log(data);
                contenido.innerHTML = data;
        } ) 
    }