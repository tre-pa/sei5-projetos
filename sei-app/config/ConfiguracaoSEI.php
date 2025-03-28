<?

class ConfiguracaoSEI extends InfraConfiguracao
{

  private static $instance = null;

  public static function getInstance()
  {
    if (ConfiguracaoSEI::$instance==null) {
      ConfiguracaoSEI::$instance = new ConfiguracaoSEI();
    }
    return ConfiguracaoSEI::$instance;
  }

  public function getArrConfiguracoes()
  {
    return array(

        'SEI' => array(
            'URL' => getenv('APP_PROTOCOLO').'://'.getenv('APP_HOST').'/sei',
            'Producao' => getenv('APP_PRODUCAO'),
            'RepositorioArquivos' => getenv('SEI_REPOSITORIO_ARQUIVOS'),
            'WebServices' => true,
            'Modulos' => array(

            ),
        ),

        'PaginaSEI' => array(
            'NomeSistema' => 'SEI',
            'NomeSistemaComplemento' => getenv('APP_NOMECOMPLEMENTO'),
            'LogoMenu' => '',
            'Login' => true,
            'Ouvidoria' => true,
            'PublicacaoInterna' => true,
            'UsuariosExternos' => true,
            'ValidacaoDocumentos' => true,
            'ConsultaProcessual' => true
        ),

        'SessaoSEI' => array(
            'SiglaOrgaoSistema' => getenv('APP_ORGAO'),
            'SiglaSistema' => 'SEI',
            'PaginaLogin' => getenv('APP_PROTOCOLO').'://'.getenv('APP_HOST').'/sip/login.php',
            'SipWsdl' => getenv('APP_PROTOCOLO').'://'.getenv('APP_HOST').'/sip/controlador_ws.php?servico=sip',
            'ChaveAcesso' => getenv('SEI_CHAVE_ACESSO'),
            'https' => (getenv('APP_PROTOCOLO') == 'https' ? true : false)),


        'BancoSEI' => array(
            'Servidor' => getenv('DB_HOST'),
            'Porta' => getenv('DB_PORTA'),
            'Banco' => getenv('DB_SEI_BASE'),
            'Usuario' => getenv('DB_SEI_USERNAME'),
            'Senha' => getenv('DB_SEI_PASSWORD'),
            'Tipo' => getenv('DB_TIPO') //MySql, SqlServer, Oracle ou PostgreSql
        ),

      
      'BancoAuditoriaSEI'  => array(
         'Servidor' => getenv('DB_HOST'),
         'Porta' => getenv('DB_PORTA'),
         'Banco' => getenv('DB_SEI_BASE'),
         'Usuario' => getenv('DB_SEI_USERNAME'),
         'Senha' => getenv('DB_SEI_PASSWORD'),
         'Tipo' => getenv('DB_TIPO')
     ), //MySql, SqlServer, Oracle ou PostgreSql
     

      /*
     'BancoReplicaSEI'  => array(
          'Servidor' => '[servidor BD]',
          'Porta' => '',
          'Banco' => '',
          'Usuario' => '',
          'Senha' => '',
          'Tipo' => ''), //MySql, SqlServer, Oracle ou PostgreSql
     */

        'CacheSEI' => array('Servidor' => getenv('MEMCACHED_HOST'),
            'Porta' => '11211'),

        'Federacao' => array(
            'Habilitado' => getenv('APP_FEDERACAO')
        ),

        'Manutencao' => array(
            'Ativada' => getenv('APP_MANUTENCAO_ATIVA') ?: false,
            'Usuarios' => getenv('APP_MANUTENCAO_USUARIOS') ? explode(',', getenv('APP_MANUTENCAO_USUARIOS')) : array(), 
            'Mensagem' => getenv('APP_MANUTENCAO_MENSAGEM') ?: 'Sistema em Manuntenчуo',
            'Detalhes' => getenv('APP_MANUTENCAO_DETALHE') ?: ''
        ),

        'hCaptcha' => array(
            'ChaveSecreta' => '',
            'ChaveSite' => ''
        ),

        'ReCaptchaV2' => array(
            'ChaveSecreta' => '',
            'ChaveSite' => ''
        ),

        'ReCaptchaV3' => array(
            'ChaveSecreta' => '',
            'ChaveSite' => '',
            'Score' => 0.5
        ),

        'Cloudflare' => array(
            'ChaveSecreta' => '',
            'ChaveSite' => ''
        ),

        'JODConverter' => array('Servidor' => 'http://'.getenv('JOD_HOST').':8080/conversion?format=pdf'),

        'Solr' => array(
            'Servidor' => getenv('SOLR_URL'),
            'Usuario' => getenv('SOLR_USUARIO'),
            'Senha' => getenv('SOLR_SENHA'),
            'CoreProtocolos' => getenv('SOLR_CORE_PROTOCOLOS'),
            'CoreBasesConhecimento' => getenv('SOLR_CORE_BASECONHECIMENTO'),
            'CorePublicacoes' => getenv('SOLR_CORE_PUBLICACOES')),

        'InfraMail' => array(
            'Tipo' => getenv('MAIL_TIPO'), //1 = sendmail (neste caso nao eh necessario configurar os atributos abaixo), 2 = SMTP
            'Servidor' => getenv('MAIL_SERVIDOR'),
            'Porta' => getenv('MAIL_PORTA'),
            'Codificacao' => getenv('MAIL_CODIFICACAO'), //8bit, 7bit, binary, base64, quoted-printable
            'MaxDestinatarios' => getenv('MAIL_MAXDESTINATARIOS'), //numero maximo de destinatarios por mensagem
            'MaxTamAnexosMb' => getenv('MAIL_MAXTAMANHOANEXOSMB'), //tamanho maximo dos anexos em Mb por mensagem
            'Seguranca' => getenv('MAIL_SEGURANCA'), //TLS, SSL ou vazio
            'Autenticar' => getenv('MAIL_AUTENTICAR'), //se true entao informar usuario e senha
            'Usuario' => getenv('MAIL_USUARIO'),
            'Senha' => getenv('MAIL_SENHA'),
            'Protegido' => getenv('MAIL_PROTEGIDO') //campo usado em desenvolvimento, se tiver um email preenchido entao todos os emails enviados terao o destinatario ignorado e substituido por este valor evitando envio incorreto de email
        )
    );
  }
}
?>