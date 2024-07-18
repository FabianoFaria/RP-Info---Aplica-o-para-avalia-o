# RP Info - Aplicação para avaliação para cargo de Dev PHP

Projeto de PHP Laravel 9 para fins de avaliação para vaga de desenvolvedor PHP

## Stack utilizada

**Front-end:** HTML, css, Bootstrap 4.1, javascript, Swagger

**Back-end:** Xampp, PHP 8, Mysql

## Instalação

Clonar o projeto via linha de comando

git@github.com:FabianoFaria/RP-Info---Aplica-o-para-avalia-o.git

faça uma copia de .env.example e renomeie para .env

configure o arquivo .env com as informações de banco de dados

```bash
  cd rp-info-app-teste
  composer install

```

## Rodando os migrates

Para rodar os migrations, tenha o .env configurado

```bash
  php artisan migrate
```

## Rodando os seeds

Para rodar os testes, rode o seguinte comando

```bash
  php artisan db:seed
```

## Rodando os testes

Para rodar os testes, rode o seguinte comando

```bash
  php artisan test
```

## Documentação da API

#### Retorna lista de todos os produtos

```http
  GET /api/produtos
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
|             |            |                                     |

#### Retorna lista de todos os produtos de determinado usuário

```http
  GET /api/usuarios/${usuario}/produtos
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `usuario`      | `string` | **Obrigatório**. O ID do usuário que você quer |

Recebe id do usuário para listar os produtos.


## Autor

- [@FabianoFaria](https://github.com/FabianoFaria)

 
## Detalhes do Desafio

# Desafio:
Um cliente nos pediu para criar um sistema de gerenciamento de produtos. O sistema deve permitir usuários
cadastrarem seus produtos. Um usuário só pode ter acessso aos produtos que ele cadastrou, ou seja,
um usuário não pode ver os produtos que outro usuário cadastrou. O sistema deve ter um endpoint
que mostre todos os produtos cadastrados do sistema. O sistema também deve ter um endpoint
que mostre os produtos que um usuário cadastrou.

Para isso, tem-se as seguintes informações das 3 entidades do sistema:

Usuario: {
    id,
    nome,
    email,
    senha
}

Produto: {
    id,
    nome,
    valor,
    usuario_id,
    categoria_id 
}

Categoria: {
    id,
    nome
}

# As entidades estão relacionadas da seguinte forma:
1 usuário tem muitos produtos.
1 produto pertence a uma categoria.

# Telas:
O sistema deve ter as seguintes telas:

- Login;
- Cadastro;
- Listagem de produtos;
- Cadastro de produto;
- Edição de produto;
- Listagem de categorias;
- Cadastro de categorias;
- Edição de categorias.

Nas telas de castro e edição de produto, o usuário deve selecionar uma categoria para o produto.

# FormRequests:
Os seguintes FormRequests são obrigatórios:

- CadastroProdutoRequest: deve validar os campos nome, valor e categoria_id.
- EdicaoProdutoRequest: deve validar os campos nome, valor e categoria_id.
- CadastroCategoriaRequest: deve validar os campos nome.
- EdicaoCategoriaRequest: deve validar os campos nome.

# Seeder:
Um usuário deve ser cadastrado utilizando seeder.
Algumas categorias devem ser cadastradas utilizando seeder.
Alguns produtos devem ser cadastradas utilizando seeder.

# API
O sistema deve ter 2 endpoint de API.
- GET /api/produtos  que retorne a lista de produtos em JSON.
- GET /api/usuarios/{usuario}  que retorne um usuário junto da lista de produtos de um usuário em JSON.

Exemplo:
- GET /api/produtos
[
    {
        "id": 1,
        "nome": "Refrigerante Cola",
        "valor": 10.00,
        "categoria": {
            "id": 1,
            "nome": "Bebidas"
        },
        "usuario": {
            "id": 1,
            "nome": "Fulano da Silva"
        }
    },
    {
        "id": 2,
        "nome": "Salgadinho",
        "valor": 2.5,
        "categoria": {
            "id": 2,
            "nome": "Alimentos"
        },
        "usuario": {
            "id": 1,
            "nome": "Fulano da Silva"
        }
    },
    {
        "id": 3,
        "nome": "Farinha de Trigo",
        "valor": 30.00,
        "categoria": {
            "id": 2,
            "nome": "Alimentos"
        },
        "usuario": {
            "id": 2,
            "nome": "Ciclano dos Santos"
        }
    }
]

- GET /api/usuario/2/produtos
{
    "usuario": {
        "id": 2,
        "nome": "Ciclano dos Santos"
        "produtos": [
            {
                "id": 3,
                "nome": "Farinha de Trigo",
                "valor": 30.00,
                "categoria": {
                    "id": 2,
                    "nome": "Alimentos"
                }
            }
        ]
    }
}

# Regra de negócio:
O usuário só pode visualizar e editar os produtos que o mesmo cadastrou.

# Avaliação
Será avaliado:
- Se o sistema cadastra produto, lista produto, edita produto e exclui produto;
- Se o sistema cadastra categoria, lista categoria, edita categoria e exclui categoria;
- Se o sistema cadastra usuário;
- Se o sistema autentica usuário;
- Se os campos estão sendo validados no backend;
- Se a api retornar todos os produtos cadastrados;
- Se a api retornar os produtos de um usuário.
- Layout, CSS e JS. O frontend fica a critério do candidato.
- Se os tipos de dados no retorno da API estão corretos.

Permissões / grupo de usuários é um diferencial.
Documentação da api em swagger é um diferencial.
Testes automatizados é um diferencial.
