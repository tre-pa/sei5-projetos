# SEI-Fontes

Imagem Docker contendo os fontes do SEI5 e módulos relacionados.

## Base da Imagem

- **Sistema Operacional:** Alpine Linux 3.21

## Estrutura de Diretórios

A imagem organiza os arquivos no seguinte diretório dentro do container:

```sh
app/
├── sei/
├── sip/
└── infra/
```


## Uso da Imagem

Para utilizar esta imagem como base em outro Dockerfile:

```dockerfile
FROM [registry]/sei-fontes:5.0.0.xyz AS fontes

WORKDIR /app

# Exemplo de cópia dos arquivos para outro diretório usando alias
COPY --from=fontes /app/sei /opt/sei
COPY --from=fontes /app/sip /opt/sip
COPY --from=fontes /app/infra /opt/infra
```


## Executar um Container com a Imagem

Para acessar os arquivos manualmente:

```sh
docker run --rm -it [registry]/sei-fontes:5.0.0.xyz /bin/sh
```

## Convenção de Versionamento (GIT Tag)

A versão da imagem seguirá a convenção abaixo:

```php-template
v<versão_do_SEI>.<CI_COMMIT_SHORT_SHA>
```

- **versão_do_SEI**: Refere-se à versão oficial do SEI (ex: 5.0.0).
- **CI_COMMIT_SHORT_SHA**: Código curto do commit no GitLab CI/CD, gerado automaticamente para identificar mudanças nos módulos instalados ou ajustes nos fontes.

### Exemplo de Tags:
- **v5.0.0.ABC1234** → Baseada na versão 5.0.0 do SEI, com alterações identificadas pelo commit ABC1234.
- **v5.0.1.DEF5678** → Baseada na versão 5.0.1 do SEI, com novos ajustes ou módulos.

Sempre que houver atualização nos fontes do SEI ou inclusão de novos módulos, a imagem deve ser versionada seguindo essa convenção.
