<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni del database
 * * Chiavi segrete
 * * Prefisso della tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni database - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'wp_uno' );

/** Nome utente del database */
define( 'DB_USER', 'root' );

/** Password del database */
define( 'DB_PASSWORD', '' );

/** Hostname del database */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di collazione del database. Da non modificare se non si ha idea di cosa sia. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chiavi univoche di autenticazione e di sicurezza.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tutti i cookie esistenti.
 * Ciò forzerà tutti gli utenti a effettuare nuovamente l'accesso.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=W7O6A}&Q1`aJ_FY:J-3|8OYv%wM9ja<Y#pf,SIQ},IO&ZKYJwk!kAH.klX2$PPD' );
define( 'SECURE_AUTH_KEY',  'Y4`uJ<mG,ycU]LjMuSxI87i@ST9{yEG{]15sc-mA;,iYgFee$v5aMVG,Pck=FT?a' );
define( 'LOGGED_IN_KEY',    ',rXDXna-$S^goCSp33e3?w/UA5]D:QKwrL0L-/|f5YTn{2898:*fxj[ygT~hp5}w' );
define( 'NONCE_KEY',        '?m~DP],3fX0_`&ds-57]#xX hr&~JU{oOXOVQc qUp3LSM4X)l!VZ:.:Y*K<9&ld' );
define( 'AUTH_SALT',        'uQ5r1L|n2,w7WLHKH`xi-g8#9L1L1CyZmsPScf1?WL;O,E9>(wFGDe/LWL^l>/!s' );
define( 'SECURE_AUTH_SALT', '3Y?398Fz1mI8s2/7CI~uB*aNUR9OnRMV-4w-c1{d{cNk~xU.pmW3 S$hf=;Z>y(9' );
define( 'LOGGED_IN_SALT',   'MC<z3a0D=3YzOeoYM{ZFI:KG;&L ab!Ftd5Go,5iOg8D?@z1*F6J`x4EPR{Ni`{$' );
define( 'NONCE_SALT',       '3_b6qnkqv-!/RU4FzpAys?z~XRsn*[5O$HycI.F&)q ~Yx{Y;x(CR5*+{P]KQ%%v' );

/**#@-*/

/**
 * Prefisso tabella del database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco. Solo numeri, lettere e trattini bassi!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Aggiungere qualsiasi valore personalizzato tra questa riga e la riga "Finito, interrompere le modifiche". */



/* Finito, interrompere le modifiche! Buona pubblicazione. */

/** Path assoluto alla directory di WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Imposta le variabili di WordPress ed include i file. */
require_once ABSPATH . 'wp-settings.php';
