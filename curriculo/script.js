document.addEventListener("DOMContentLoaded", function() {
    const dataDeNascimento = document.getElementById("dataDeNascimento");
    const idade = document.getElementById("idade");
    const adicionarExperiencias = document.getElementById("adicionar-experiencias");
    const experienciasContainer = document.getElementById("experiencias");

    dataDeNascimento.addEventListener("change", function() {
        const dataNasc = new Date(dataDeNascimento.value);
        const hoje = new Date();
        let idadeCalculada = hoje.getFullYear() - dataNasc.getFullYear();
        const mes = hoje.getMonth() - dataNasc.getMonth();

        if (mes < 0 || (mes === 0 && hoje.getDate() < dataNasc.getDate())) {
            idadeCalculada--;
        }

        idade.value = idadeCalculada;
    });

    adicionarExperiencias.addEventListener("click", function() {
        const novaExperiencia = document.createElement("div");
        novaExperiencia.className = "experiencia";

        novaExperiencia.innerHTML = `
            <label for="empresa">Empresa:</label>
            <input type="text" name="empresa[]" placeholder="Nome da empresa" />

            <label for="cargo">Cargo:</label>
            <input type="text" name="cargo[]" placeholder="Seu cargo" />

            <label for="descricao">Descrição:</label>
            <textarea name="descricao[]" placeholder="Descrição das suas atividades"></textarea>

            <button type="button" class="remover-experiencia">Remover</button>
        `;

        experienciasContainer.appendChild(novaExperiencia);

        novaExperiencia.querySelector(".remover-experiencia").addEventListener("click", function() {
            experienciasContainer.removeChild(novaExperiencia);
        });
    });
});