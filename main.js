$('#modal-excluir').on('show.bs.modal', function (event) {
    let botao = $(event.relatedTarget);
    let id = botao.data('pessoa');
    let nome = botao.data('nome');

    let modal = $(this);
    modal.find('.modal-title').text('Excluir Cliente ' + nome);
    modal.find('#confirm').attr('href', 'index.php?id=' + id);
});

const calcularIdade = () => {
    let dataNascimento = document.getElementById('nascimento').value;
    dataNascimento = new Date(dataNascimento);
    const hoje = new Date();
    const idade = hoje.getFullYear() - dataNascimento.getFullYear();
    let idadeLabel = document.getElementById('idade');
    idadeLabel.innerHTML = 'Idade: ' + idade + ' anos';

}
