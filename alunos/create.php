<div class="form create-alunos">
    <form action="" method="post">
        <h1>Cadastrar aluno</h1>
        <hr>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required> <br>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" maxlength="14" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"
       required> <br>
        
        <label for="curso">Curso</label>
        <select name="curso" id="curso">
            <option value="vazio">---</option>
            <option value="agro">Técnico em Agropecuária</option>
            <option value="agri">Técnico em Agrimensura</option>
            <option value="alim">Técnico em Alimentos</option>
            <option value="info">Técnico em Informática</option>
            <option value="meio">Técnico em Meio Ambiente</option>
        </select> <br>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required> <br>

        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone" maxlenght="13" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" required> <br>

        <input type="submit" value="Cadastrar">
    </form>
</div>
