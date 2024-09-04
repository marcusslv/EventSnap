# EventSnap

**EventSnap** é uma plataforma especializada no gerenciamento e compartilhamento de fotos de eventos. Permite que fotógrafos organizem e publiquem imagens de forma intuitiva, com recursos para visualização em galeria, compartilhamento em redes sociais e download de álbuns completos.

# Funcionalidades

1. **Autenticação e Autorização de Usuários**  
   **Descrição:** O sistema deve permitir que os usuários façam login utilizando e-mail e senha, garantindo que somente usuários autenticados tenham acesso às funcionalidades do sistema. Deve suportar diferentes níveis de acesso, como administrador, fotógrafo e visitante.  
   
   **Critérios de Aceitação:**
   - O sistema deve permitir que um usuário se autentique utilizando seu e-mail e senha.
   - Se as credenciais estiverem corretas, o usuário deve ser redirecionado para o dashboard correspondente ao seu nível de acesso.
   - Usuários não autenticados devem ser redirecionados para a página de login ao tentar acessar qualquer funcionalidade protegida.
   - Usuários devem receber uma mensagem de erro clara em caso de tentativa de login com credenciais inválidas.
   - O administrador deve poder gerenciar permissões de outros usuários através do painel de controle.

2. **Cadastro e Gerenciamento de Eventos**  
   **Descrição:** O sistema deve permitir que administradores e fotógrafos criem, editem e excluam eventos, cada um com detalhes como título, descrição, data, local e fotógrafo responsável.  
   
   **Critérios de Aceitação:**
   - Administradores e fotógrafos devem conseguir criar um novo evento preenchendo os campos obrigatórios.
   - O sistema deve validar os dados do evento, impedindo a criação com campos obrigatórios em branco.
   - Os eventos criados devem aparecer em uma lista com opções para edição e exclusão.
   - Somente administradores e fotógrafos devem conseguir editar ou excluir eventos.
   - Uma mensagem de confirmação deve ser exibida antes de excluir um evento.

3. **Upload de Fotos**  
   **Descrição:** Fotógrafos devem poder fazer upload de fotos para eventos específicos, com a possibilidade de enviar múltiplas fotos de uma vez. As fotos devem ser redimensionadas e otimizadas para a web automaticamente.  
   
   **Critérios de Aceitação:**
   - O sistema deve permitir que o fotógrafo selecione múltiplas fotos para upload.
   - Após o upload, as fotos devem ser automaticamente redimensionadas para diferentes tamanhos (miniatura e tamanho completo).
   - As fotos devem ser associadas ao evento correto, e uma mensagem de sucesso deve ser exibida após o upload.
   - O sistema deve apresentar uma mensagem de erro caso o upload falhe por qualquer motivo.

4. **Organização das Fotos**  
   **Descrição:** O sistema deve permitir a organização das fotos em álbuns dentro de cada evento, categorizando-as por temas como “Cerimônia”, “Recepção”, etc.  
   
   **Critérios de Aceitação:**
   - O fotógrafo deve poder criar álbuns dentro de um evento e nomeá-los conforme necessário.
   - Fotos devem ser arrastadas e soltas nos álbuns desejados.
   - O sistema deve permitir que o fotógrafo categorize fotos em diferentes temas, e essas categorias devem ser exibidas claramente para os visitantes.
   - O sistema deve exibir as fotos de acordo com a organização definida pelo fotógrafo.

5. **Visualização de Fotos**  
   **Descrição:** Os visitantes devem poder visualizar fotos em uma galeria de imagens, com opções para visualização em miniatura e em tamanho completo, além de aplicar zoom.  
   
   **Critérios de Aceitação:**
   - O sistema deve exibir uma galeria de imagens para cada evento com todas as fotos organizadas em álbuns.
   - Os visitantes devem poder clicar em uma foto para visualizá-la em tamanho completo.
   - A opção de zoom deve estar disponível ao visualizar fotos em tamanho completo.
   - A navegação entre as fotos dentro de um álbum deve ser fluida, sem recarregar a página.

6. **Compartilhamento de Fotos**  
   **Descrição:** O sistema deve permitir que os visitantes compartilhem fotos individuais ou álbuns inteiros nas redes sociais ou por e-mail.  
   
   **Critérios de Aceitação:**
   - Deve haver botões de compartilhamento visíveis ao visualizar uma foto ou álbum.
   - Os visitantes devem poder escolher entre compartilhar uma foto específica ou um álbum inteiro.
   - Ao compartilhar, o sistema deve gerar um link público que redireciona para a foto ou álbum selecionado.
   - Deve ser exibida uma mensagem de confirmação após o compartilhamento.

7. **Download de Fotos**  
   **Descrição:** Os visitantes devem ter a opção de baixar fotos individuais ou álbuns completos, com controle de acesso para garantir que apenas usuários autorizados possam realizar o download.  
   
   **Critérios de Aceitação:**
   - Deve haver um botão de download disponível para cada foto e álbum.
   - O sistema deve verificar se o visitante está autorizado a realizar o download antes de iniciar o processo.
   - Após a autorização, o download deve ser iniciado automaticamente.
   - Uma mensagem de erro deve ser exibida caso o visitante não esteja autorizado a baixar a foto ou álbum.

8. **Comentários e Feedback**  
   **Descrição:** Os visitantes podem comentar nas fotos, se autorizado. O administrador ou fotógrafo pode moderar os comentários.  
   
   **Critérios de Aceitação:**
   - Visitantes devem poder adicionar comentários às fotos, se essa funcionalidade estiver ativada.
   - O sistema deve exibir os comentários em ordem cronológica abaixo da foto.
   - O administrador ou fotógrafo deve ter a capacidade de aprovar, editar ou excluir comentários.
   - Comentários ofensivos ou inadequados devem ser bloqueados automaticamente com base em um filtro de palavras-chave.

9. **Notificações**  
   **Descrição:** O sistema deve enviar notificações por e-mail quando novos eventos ou fotos forem adicionados, com opções de configuração de notificações para administradores e fotógrafos.  
   
   **Critérios de Aceitação:**
   - O sistema deve enviar um e-mail para os usuários registrados quando um novo evento ou fotos forem adicionados.
   - Usuários devem poder optar por receber ou não essas notificações.
   - Administradores e fotógrafos devem receber notificações sobre atividades relacionadas aos seus eventos.
   - As notificações devem incluir links diretos para os eventos ou fotos recém-publicados.
