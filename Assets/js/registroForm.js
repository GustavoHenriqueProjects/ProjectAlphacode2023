function validarFormulario() {

    console.log("fgdffgdgf");
    var nome = document.querySelector('#nome').value;
    var dataNascimento = document.querySelector('#data_nascimento').value;

    if (nome === '' || dataNascimento === '') {
        alert('Por favor, preencha todos os campos obrigatórios.');
        return false; // Impede o envio do formulário se a validação falhar
    }

    // Adicione outras verificações conforme necessário

    return true; // Permite o envio do formulário se a validação for bem-sucedida
}

// Capturar o formulário pelo ID
var formulario = document.querySelector('form');

// Adicionar um ouvinte de evento para a validação ao enviar o formulário
formulario.addEventListener('submit', function (event) {
    if (!validarFormulario()) {
        event.preventDefault(); // Impede o envio do formulário se a validação falhar
    }
});