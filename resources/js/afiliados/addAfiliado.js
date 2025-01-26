document.querySelector('#AgregarBeneficiarios').addEventListener('click', function() {
    let inputsExistentes= document.getElementsByClassName('beneficiario');    
    if(inputsExistentes.length<6){
        AddAfiliados()
    }
  });
document.querySelector('#eliminarBeneficiarios').addEventListener('click', function() {
    
    let inputsExistentes= document.getElementsByClassName('beneficiario');    
    
    if(inputsExistentes.length!=1){
        delAfiliados()
    }
  });


  const AddAfiliados =() =>{        
    let container = document.getElementById('beneficiarios-container');
    let beneficiario = container.querySelector('.beneficiario').cloneNode(true);
    container.appendChild(beneficiario);
  }

  const delAfiliados =() =>{        
    let container = document.getElementById('beneficiarios-container');
    let beneficiario = container.querySelector('.beneficiario');
    container.removeChild(beneficiario);
  }


  document.querySelector('#CedulaTitular').addEventListener('key', function() {
    alert("no esta registrado");
  });