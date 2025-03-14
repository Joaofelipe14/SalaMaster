**Projeto Laravel de Gestão Acadêmica**

Este é um projeto Laravel para gestão acadêmica, com funcionalidades básicas de CRUD para professores e períodos. Abaixo estão as instruções para configurar e executar o projeto.

**Configuração Inicial:**

1. **Clone o Repositório:**
   ```bash
   git clone <URL_DO_REPOSITORIO>
   ```

2. **Instale as Dependências:**
   ```bash
   composer install
   ```

3. **Configure o Banco de Dados:**
   - Copie o arquivo `.env.example` para um novo arquivo chamado `.env`.
   - Configure as credenciais do banco de dados no arquivo `.env`.

4. **Migração do Banco de Dados:**
   - Execute o comando para migrar o banco de dados:
     ```bash
     php artisan migrate
     ```
   - (Opcional) Para popular o banco de dados com dados de exemplo, execute:
     ```bash
     php artisan migrate:refresh --seed
     ```

5. **Inicie o Servidor Embutido:**
   ```bash
   php artisan serve
   ```

6. **Rotas Disponíveis:**
   - `/professores` - Lista todos os professores.
   - `/professores/create` - Formulário para adicionar um novo professor.
   - `/professores/{id}` - Exibe detalhes de um professor específico.
   - `/professores/{id}/edit` - Formulário para editar um professor.
   - `/periodos` - Lista todos os períodos.
   - `/periodos/create` - Formulário para adicionar um novo período.
   - `/periodos/{id}` - Exibe detalhes de um período específico.
   - `/periodos/{id}/edit` - Formulário para editar um período.

**Observações:**
- Certifique-se de ter o PHP instalado no seu ambiente.
- Antes de executar as migrações, configure corretamente o banco de dados no arquivo `.env`.
- O comando `php artisan serve` iniciará o servidor em `http://localhost:8000` por padrão.

Sinta-se à vontade para expandir este projeto conforme necessário para atender aos requisitos específicos do seu aplicativo.


###Telas 

![Tela de login do sistema](https://raw.githubusercontent.com/Joaofelipe14/SalaMaster/refs/heads/main/public/preview/login.png)
_Tela de login_

![Tela de login do sistema](https://raw.githubusercontent.com/Joaofelipe14/SalaMaster/refs/heads/main/public/preview/lista_mensagens.png)
_Tela de listar mensagens_

![Tela de login do sistema](https://raw.githubusercontent.com/Joaofelipe14/SalaMaster/refs/heads/main/public/preview/tela_criar_professor.png)
_Tela de criar professor_

![Tela de login do sistema](https://raw.githubusercontent.com/Joaofelipe14/SalaMaster/refs/heads/main/public/preview/tela_horarios.png)
_Tela de horarios_