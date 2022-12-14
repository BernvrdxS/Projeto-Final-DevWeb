function validate() {

    let hoje = new Date(); //data atual
    let dtNasc = new Date(dataNascimentoAluno.value);

    let idadeAluno = hoje.getFullYear() - dtNasc.getFullYear();
    let m = hoje.getMonth() - dtNasc.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < dtNasc.getDate())) {
        idadeAluno--;
    }
    if (idadeAluno >= 0) document.getElementById('idadeAluno').value = idadeAluno + ' anos ';
    else document.getElementById('idadeAluno').value = "Essa data não é válida"

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
    document.querySelector("form")
        .addEventListener("submit", event => {
            console.log("enviar o formulário")

            // não vai enviar o formulário
            event.preventDefault()
        })
});

function carregaDados() {
    busca = document.getElementById('busca').value;
    const xhttp = new XMLHttpRequest();  // cria o objeto que fará a conexão assíncrona
    xhttp.onload = function () {  // executa essa função quando receber resposta do servidor
        dados = JSON.parse(this.responseText); // os dados são convertidos para objeto javascript
        console.log(dados);
        montaTabela(dados);
    }
    // configuração dos parâmetros da conexão assíncrona
    xhttp.open("GET", "pesquisaAluno.php?busca=" + busca, true);  // arquivo que será acessado no servidor remoto  
    xhttp.send(); // parâmetros para a requisição

}
function montaTabela(dados) {
    str = "";
    for (aluno of dados) {
        editar = '<a href=cadastrarAluno.php?acaoAluno=editar&idAluno=' + aluno.idAluno + '>Alterar</a>';
        excluirAluno = "<a href='#' onclick=excluir('acaoAluno.php?acaoAluno=excluir&idAluno=" + aluno.idAluno + "')>Excluir</a>";
        str += "<tr><td>" + aluno.idAluno + "</td><td>" + aluno.nomeAluno + "</td><td>" + aluno.telefoneAluno + "</td><td>" + aluno.materiaAluno + "</td><td>" + aluno.nomeProfessor + "</td><td>" + editar + "</td><td>" + excluirAluno + "</td>"
    }
    document.getElementById('corpo').innerHTML = str;
}

const fields = document.querySelectorAll("[required]")

function ValidateField(field) {
    // logica para verificar se existem erros
    function verifyErrors() {
        let foundError = false;

        for (let error in field.validity) {
            // se não for customError
            // então verifica se tem erro
            if (field.validity[error] && !field.validity.valid) {
                foundError = error
            }
        }
        return foundError;
    }

    function customMessage(typeError) {
        const messages = {
            text: {
                valueMissing: "O nome é obrigatório"
            },
            number: {
                valueMissing: "O número é obrigatório",
                typeMismatch: "Por favor, preencha um número válido"
            },
            date: {
                valueMissing: "A data de nascimento é obrigatória",
                typeMismatch: "Por favor, preencha uma data válida"
            }
        }

        return messages[field.type][typeError]
    }

    function setCustomMessage(message) {
        const spanError = field.parentNode.querySelector("span.error")

        if (message) {
            spanError.classList.add("active")
            spanError.innerHTML = message
        } else {
            spanError.classList.remove("active")
            spanError.innerHTML = ""
        }
    }

    return function () {

        const error = verifyErrors()

        if (error) {
            const message = customMessage(error)

            field.style.borderColor = "red"
            setCustomMessage(message)
        } else {
            field.style.borderColor = "green"
            setCustomMessage()
        }
    }
}


function customValidation(event) {

    const field = event.target
    const validation = ValidateField(field)

    validation()

}

for (field of fields) {
    field.addEventListener("invalid", event => {
        // eliminar o bubble
        event.preventDefault()

        customValidation(event)
    })
    field.addEventListener("blur", customValidation)
}


