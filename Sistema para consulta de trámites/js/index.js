const btns = document.querySelectorAll("#content");


function sendData( valor ){
  let url = 'Querys/modules/RequisitosSecretariaTecnica.php';

  let formaData = new FormData();
  console.log(`el valor es ${valor}`);
  formaData.append('tramite', formaData);
  fetch( url, {
        method:'POST',
        body: formaData
    } ).then( response => response.json() )
        .then ( data =>{
          console.log(data);
          
  } ) 
}



const accionBotones = (e)=>{
  let valor = e.target.getAttribute('id');
  //sendData(valor);
  console.log(valor);
  if( valor == "content" ){
    window.location.href = "index.php";
  }else{
    window.location.href = "Departamentos/SecretariaTecnica.php?v="+valor;  
  }
}

btns.forEach( (div)=>{
    div.addEventListener( "click", accionBotones );
} );
