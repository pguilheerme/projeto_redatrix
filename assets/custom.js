const div = document.querySelector(".listar-videos");

const listarVideos = async (pagina) =>{
    const dados = await fetch("../../controller/listarVideos.php?pagina=" + pagina);
    const resposta = await dados.text();
    div.innerHTML = resposta;
}

listarVideos(1);

const repertorio = document.querySelector(".lista-r");

const listarRepertorio = async (paginaR) =>{
    const dados = await fetch("../../controller/listarRepertorio.php?pagina=" + paginaR);
    const reposta = await dados.text();
    repertorio.innerHTML = reposta;
}

listarRepertorio(1);

const msgAlerta = document.getElementById("msgAlerta");

async function apagarRepertorio(id){
    var confirmar = confirm("Tem certeza que deseja excluir o arquivo selecionado?");

    if(confirmar == true) {
        const dados = await fetch('../../controller/excluirDados.php?id=' + id );
        const resposta = await dados.json();
        if(resposta['erro']){
            msgAlerta.innerHTML = resposta['msg'];
        } else {
            msgAlerta.innerHTML = resposta['msg'];
            listarRepertorio(1);
        }
    }  
}

async function apagarvideo(id){
    var confirmar = confirm("Tem certeza que deseja excluir o arquivo selecionado?");

    if(confirmar == true) {
        const dados = await fetch('../../controller/excluirvideo.php?id=' + id );
        const resposta = await dados.json();
        if(resposta['erro']){
            msgAlerta.innerHTML = resposta['msg'];
        } else {
            msgAlerta.innerHTML = resposta['msg'];
            listarVideos(1);
        }
    }  
}

