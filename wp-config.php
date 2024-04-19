<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'laserhead_dev' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0M__qAHMcS5R+%0U+IVW7pZ^+GQb1sX-9@[mjS.Iny}Ia{dZnUAZMFoa`7=gN9`+' );
define( 'SECURE_AUTH_KEY',  'l>6Ve?yf+*ih_J(90qT4[U<,|URWmd-^=]b1mrOV9u)-6K#DX,dN:@}z6n~37l{G' );
define( 'LOGGED_IN_KEY',    'N}i%5@;`52-+C)f:8ZjW=]RI^`k|JKYceSo3V39`0#v.<|Q^vMftSxVrY}+#e7]a' );
define( 'NONCE_KEY',        'j,,VCrP:P7KfTkz]]h~3bmd3EyG_nSK8w-u$6Xf.60m,cm)T<!^h,f$=.INX%3]r' );
define( 'AUTH_SALT',        'ity9 ADnxZBa33f* psOaBz*q(Lzq$w;D3BB*szUP9?.5PT?$S-{Z?J)N =Ls`D`' );
define( 'SECURE_AUTH_SALT', '$fCh[;UN]O J*5eyO4^YScrf>KsHb3ZOVw.kz+nQ~~a<F/>(no%wPVyZVH*]BjW-' );
define( 'LOGGED_IN_SALT',   ')9/y3984bM-|)nM >|1V,V1Kyy3w,0S7.)ToGU7#<=v6mDD^etQpT`Q-1+bdY-NZ' );
define( 'NONCE_SALT',       ';z<4mh&QPUd][>c^7w{(S5pUrH)/GEYdK{FdZvQFj>1at{^Pf .[j+~R6-Ps8i_G' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
