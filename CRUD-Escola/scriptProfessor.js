function validate() {

    let hoje = new Date(); //data atual
    let dtNasc = new Date(dataNascimentoProfessor.value);

    let idadeProfessor = hoje.getFullYear() - dtNasc.getFullYear();
    let m = hoje.getMonth() - dtNasc.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < dtNasc.getDate())) {
        idadeProfessor--;
    }
    if (idadeProfessor >= 0) document.getElementById('idadeProfessor').value = idadeProfessor + ' anos ';
    else document.getElementById('idadeProfessor').value = "Essa data não é válida"

}
// floreio -- para o usuário confirmar a exclusão
function excluir(url) {
    if (confirm("Confirma a exclusão?"))
        window.location.href = url; //redireciona para o arquivo que irá efetuar a exclusão
}

window.onload = (function () {
    carregaDados();
    document.getElementById('pesquisa').addEventListener('submit', function (ev) {
        ev.preventDefault();
        carregaDados();
    });
    document.getElementById('busca').addEventListener('keyup', carregaDados);
});

function carregaDados() {
    busca = document.getElementById('busca').value;
    const xhttp = new XMLHttpRequest();  // cria o objeto que fará a conexão assíncrona
    xhttp.onload = function () {  // executa essa função quando receber resposta do servidor
        dados = JSON.parse(this.responseText); // os dados são convertidos para objeto javascript
        montaTabela(dados);
    }
    // configuração dos parâmetros da conexão assíncrona
    xhttp.open("GET", "pesquisa.php?busca=" + busca, true);  // arquivo que será acessado no servidor remoto  
    xhttp.send(); // parâmetros para a requisição

}
function montaTabela(dados) {
    str = "";
    for (professor of dados) {
        editar = '<a href=cadastrar.php?acaoProfessor=editar&id=' + professor.id + '>Alt</a>';
        excluir = "<a href='#' onclick=excluir('acaoProfessor.php?acaoProfessor=excluir&id=" + professor.id + "}')>Excluir</a>";
        str += "<tr><td>" + professor.id + "</td><td>" + professor.nome + '</td>'
    }
    document.getElementById('corpo').innerHTML = str;
}
