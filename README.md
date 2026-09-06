# AVAFORMADORA

Projeto PHP da Avaliação Formadora (Competência 1) do curso de Análise e Desenvolvimento de Sistemas - Back-End.

## Resumo da avaliação

- Tela principal (1 ponto): nome, matrícula, foto, logo da UNISUAM e outras informações relevantes.
- Exercício 1 (3 pontos): receber nome, sobrenome e quantidade; alternar nome e sobrenome em PHP até completar as repetições.
- Exercício 2 (2 pontos): receber login e senha; validar em PHP e mostrar sucesso ou falha.
- Exercício 3 (1 ponto): receber massa e volume; calcular a densidade em PHP usando `d = m / v`.
- Todo o projeto deve ser responsivo e todos os botões **Voltar** devem levar à página principal.
- A entrega é um vídeo de até 5 minutos no YouTube; o link deve ser publicado no AVA.

## 1. Personalização obrigatória

1. Duplique `config.local.example.php` e renomeie a cópia para `config.local.php`.
2. Em `config.local.php`, informe seu nome, matrícula e chave do AVA.
3. Coloque sua foto em `assets/img/foto-aluno.jpg` (formato quadrado funciona melhor).
4. Gere um hash para a senha que será usada na demonstração:

```powershell
C:\xampp\php\php.exe -r "echo password_hash('SUA_SENHA_AQUI', PASSWORD_DEFAULT), PHP_EOL;"
```

5. Copie o resultado iniciado por `$2y$` para o campo `password_hash` de `config.local.php`.

O arquivo `config.local.php` está no `.gitignore`. Não publique esse arquivo nem mostre sua senha no vídeo. Por segurança, prefira uma senha criada somente para a demonstração; se a avaliação realmente exigir a credencial institucional, mantenha apenas o hash local e troque a senha após gravar.

Enquanto a personalização não for feita, o modo de demonstração usa:

- Login: `SUA_CHAVE_AVA`
- Senha: `SUA_SENHA_AVA`

## 2. Como executar

### Opção A - Servidor embutido do PHP

Abra o PowerShell nesta pasta e execute:

```powershell
C:\xampp\php\php.exe -S localhost:8080
```

Depois acesse `http://localhost:8080`.

### Opção B - XAMPP

1. Copie a pasta `AVAFORMADORA` para `C:\xampp\htdocs\`.
2. Abra o painel do XAMPP e inicie o Apache.
3. Acesse `http://localhost/AVAFORMADORA/`.

## 3. Roteiro sugerido para o vídeo (até 5 minutos)

- **0:00-0:30:** apresente seu nome, matrícula, curso e o objetivo do projeto.
- **0:30-1:00:** mostre a tela principal, o menu e a responsividade com o F12.
- **1:00-2:10:** no Exercício 1, teste `Marcelo`, `Loutfi` e `5`; mostre a sequência alternada.
- **2:10-3:20:** no Exercício 2, teste primeiro uma senha incorreta e depois a correta; mostre as duas mensagens.
- **3:20-4:20:** no Exercício 3, use massa `8` e volume `4`; mostre a densidade `2 g/cm³`.
- **4:20-4:50:** use os botões Voltar e encerre reforçando que os resultados foram processados em PHP.

## 4. Checklist antes de postar

- [ ] Nome, matrícula e foto foram personalizados.
- [ ] Login correto autentica e login incorreto falha.
- [ ] Os três exercícios funcionam.
- [ ] Todos os botões Voltar levam à tela principal.
- [ ] O projeto foi testado no modo mobile pelo F12.
- [ ] O vídeo tem no máximo 5 minutos.
- [ ] O vídeo foi publicado no YouTube e o link foi enviado no AVA.

