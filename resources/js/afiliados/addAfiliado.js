document.addEventListener("click", function(event){
  //escucha todos los click en el documento
  let idAccion=event.target.id;
  let inputsExistentes= document.getElementsByClassName('beneficiario');    
    // si el click realizado correspondea alguna de las acciones procede a ejecutar la accion
    if(inputsExistentes.length!=1 && idAccion=="eliminarBeneficiarios"){
      delAfiliados()
    }else if(inputsExistentes.length<6 && idAccion=="AgregarBeneficiarios"){
      AddAfiliados()
    }
  
});

  const AddAfiliados =() =>{        
    let container = document.getElementById('beneficiarios-container');
    let beneficiario = container.querySelector('.beneficiario').cloneNode(true);
    let inputs = beneficiario.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    });
    container.appendChild(beneficiario);
  }

  const delAfiliados =() =>{        
    let container = document.getElementById('beneficiarios-container');
    let beneficiario = container.querySelector('.beneficiario');
    container.removeChild(beneficiario);
  }


  // document.querySelector('#CedulaTitular').addEventListener('key', function() {
  //   alert("no esta registrado");
  // });