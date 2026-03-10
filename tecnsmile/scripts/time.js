const nome=window.prompt(' por motivos de segurança qual é seu nome?');
const agora = new Date();
const horas = String(agora.getHours()).padStart(2, "0");
const minutos = String(agora.getMinutes()).padStart(2, "0");
document.getElementById("times").textContent = `ola ${nome} seja bem vindo ${horas}:${minutos}`;
