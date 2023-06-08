# CRUD PHP + MYSQL

Sistema financeiro familiar

----

## O sistema deverá ter as seguintes funcionalidades:

- Registro de despesas e receitas: Permitir que os membros da família registrem suas despesas e receitas de forma fácil e organizada.

- Categorização de transações: Possibilitar a classificação das despesas e receitas em categorias específicas (alimentação, moradia, transporte, entretenimento, etc.) para uma melhor análise e acompanhamento.

- Orçamento familiar: Permitir o estabelecimento de metas de gastos para diferentes categorias e acompanhar o progresso em relação a essas metas.

- Controle de contas a pagar e a receber: Registrar e monitorar as contas a pagar, como contas de água, luz, telefone, aluguel, entre outras, assim como as contas a receber, como pagamentos devidos por outras pessoas.

- Alertas e lembretes: Enviar lembretes automáticos sobre contas a pagar próximas do vencimento, ajudando a evitar atrasos e multas.

- Análise de gastos: Gerar relatórios e gráficos para visualizar os gastos por categoria, identificar padrões de gastos excessivos e tomar medidas para economizar.

- Planejamento financeiro: Auxiliar na definição de metas financeiras de longo prazo, como poupar para a compra de uma casa, a educação dos filhos ou a aposentadoria.

- Sincronização entre dispositivos: Permitir o acesso ao sistema de controle financeiro familiar a partir de diferentes dispositivos (computadores, smartphones, tablets) para facilitar a inserção de dados em tempo real.

- Segurança de dados: Garantir a segurança das informações financeiras da família por meio de criptografia e medidas de proteção adequadas.

- Acesso restrito: Permitir a configuração de perfis de usuários com diferentes níveis de acesso, garantindo que apenas os membros autorizados da família possam visualizar e editar os dados financeiros.

-----

## O sistema poderá ter as seguintes classes

- Classe Usuário: Responsável por gerenciar as informações dos usuários do sistema, como nome, senha, e configurações de acesso.

- Classe Transação: Representa uma transação financeira, contendo informações como valor, data, descrição e categoria.

- Classe Conta: Representa uma conta financeira, como conta corrente, poupança, cartão de crédito, etc. Essa classe pode incluir informações como saldo, limite, taxas, entre outros.

- Classe Categoria: Representa as categorias de gastos e receitas, como alimentação, moradia, transporte, salário, entre outras.

- Classe Orçamento: Gerencia as metas de gastos estabelecidas para cada categoria, permitindo o acompanhamento do progresso e a emissão de alertas em caso de estouro do orçamento.

- Classe Relatório: Responsável por gerar relatórios financeiros, como demonstrativo de despesas, receitas por categoria, gráficos de gastos mensais, entre outros.

- Classe Notificação: Implementa funcionalidades de envio de alertas e lembretes aos usuários, como lembretes de contas a pagar, avisos de limite de gastos, entre outros.

- Classe Autenticação: Realiza a autenticação e controle de acesso dos usuários ao sistema, verificando suas credenciais e permissões.

- Classe Configuração: Gerencia as configurações do sistema, permitindo personalizações como idioma, moeda, formatos de data, entre outros.

- Classe Backup: Responsável por realizar backups periódicos dos dados do sistema, garantindo a segurança e a recuperação em caso de falhas ou perdas.

-----------

## Base de dados

- Tabelas: Identifique as entidades principais do sistema, como usuários, transações, contas, categorias, orçamentos e outras que sejam relevantes para o seu contexto. Crie tabelas para armazenar os dados relacionados a cada entidade.

- Colunas: Defina as colunas necessárias para cada tabela, representando os atributos ou informações que deseja armazenar. Por exemplo, a tabela de transações pode ter colunas como valor, data, descrição e categoria.

- Chaves primárias: Identifique as chaves primárias de cada tabela, que serão utilizadas para garantir a unicidade dos registros. Geralmente, é comum utilizar um identificador único, como um campo numérico autoincremental.

- Relacionamentos: Analise os relacionamentos entre as entidades e estabeleça as chaves estrangeiras nas tabelas correspondentes. Por exemplo, uma transação pode estar associada a uma conta e a uma categoria, portanto, as tabelas de transações, contas e categorias devem ter chaves estrangeiras para representar essas associações.

- Índices: Considere a criação de índices para melhorar o desempenho das consultas na base de dados. Identifique as colunas mais utilizadas em consultas e crie índices adequados para agilizar a busca e recuperação dos dados.

- Restrições: Defina restrições de integridade para garantir a consistência e a validade dos dados. Isso pode incluir restrições de chave primária, restrições de chave estrangeira e restrições de valor único, por exemplo.

- Normalização: Considere aplicar as regras de normalização para evitar redundância e inconsistência nos dados. Isso envolve dividir as informações em tabelas distintas e garantir a integridade referencial.

- Backup e recuperação: Implemente uma estratégia de backup e recuperação para proteger seus dados contra perdas ou falhas. Isso pode incluir a realização de backups periódicos e a definição de procedimentos para restaurar os dados em caso de necessidade.