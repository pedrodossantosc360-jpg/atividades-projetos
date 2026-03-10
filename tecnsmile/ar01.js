let cc = 0;
const textt = document.getElementById('textoso');
textt.innerText = cc;

document.getElementById('ff').addEventListener("submit", async function(event){
    event.preventDefault();
    await enviar();
});

async function enviar() {
    const dados = {
        servico: document.getElementById('selecao').value,
        dia: document.getElementById('dia').value,
        hora: document.getElementById('hora').value
    };

    if (!dados.servico || !dados.dia || !dados.hora) {
        alert("⚠️ Preencha todos os campos!");
        return;
    }

    const resposta = await fetch('agendar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(dados)
    });

    const msg = await resposta.text();
    alert(msg);
    carregarConsultas();
}

async function carregarConsultas() {
    const res = await fetch('listar.php');
    const consultas = await res.json();

    cc = consultas.length;
    textt.innerText = cc;
}

carregarConsultas();

