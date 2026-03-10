
function  iniciar(){
  var novaetapa=document.createElement('input');
    novaetapa.setAttribute('type','email');
    novaetapa.setAttribute('id','email');
    novaetapa.setAttribute('name','email');
    novaetapa.setAttribute('placheolder','isira seu email');
    const novolabel=document.createElement('label');
        novolabel.setAttribute('for','email');
        novolabel.textContent=('email');
    const novolabel2=document.createElement('label');
        novolabel2.setAttribute('for','senhas');
        novolabel2.textContent=('senha');
var novaetapa2=document.createElement('input');
    novaetapa2.setAttribute('type','password');
    novaetapa2.setAttribute('id','senha');
    novaetapa2.setAttribute('name','senhas');
    novaetapa2.setAttribute('placheolder','coloque a senha');
    const novolabel3=document.createElement('label');
        novolabel3.setAttribute('for','senha');
        novolabel3.textContent=('senha');
var novaetapa3=document.createElement('input');
    novaetapa3.setAttribute('type','submit');
    novaetapa3.setAttribute('id','en');
    
    novaetapa3.setAttribute('value','entrar');

const inicio=document.getElementById('botao');
const inicio2=document.getElementById('senhasr');
inicio.appendChild(novolabel);
inicio.appendChild(novaetapa);
inicio2.appendChild(novolabel2);
inicio2.appendChild(novaetapa2);
const inicio3=document.getElementById('bf');
inicio3.appendChild(novaetapa3);
const inicio4=document.createElement('form');
inicio4.setAttribute('action','scripts/processando_dados.php');
inicio4.setAttribute('method','POST');
inicio4.appendChild(inicio);
inicio4.appendChild(inicio2);
inicio4.appendChild(inicio3);
const inicio5=document.getElementById('ola');
inicio5.appendChild(inicio4)
var elementoremovudo=document.getElementById('sejabemvindo');
    elementoremovudo.remove();
}
    