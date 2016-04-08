<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'conferpedia');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '<~9`lX7x8<]On:_<zXwK&%awmezjib?r/k6DIL^9J%PP6|6@+CV+)oH.8blnXc|S');
define('SECURE_AUTH_KEY', '_[El-gp-6#oSXVOxfxX%.c!X;e*O*Fp9[[^Hq_-*Pznf<4OB4523Ah9895`a |u5');
define('LOGGED_IN_KEY', '_tZ/Dv`W>8MHh1e}=aW/K* /1eEj2[w@&%/w@.p1ed.Z9B80<?:Ah8SNV+zMs=+|');
define('NONCE_KEY', '+*dl.j~x//U;6P,X/X:.1`>(v/?+/t$]=QXp>T4<Nd>-Iv|,2xp+53,=;rw+Y:da');
define('AUTH_SALT', '_BG1@D()LEHhs^B|,2tQ^t.5Bo-{WK-<^#Bb7OS+R>};DD+++.fel6/^>!iE$M+n');
define('SECURE_AUTH_SALT', 'VpQ`F+SdB*lcQ)n1kLj4o=jT{bnx4rkC}Pr9A0}SB-Z{t=~q35V4l6o%+ni c=II');
define('LOGGED_IN_SALT', '+x>/9S?t/65>8@0A^&ssejC.|4-osW:ZJ1D)wQe-!.?7-~~(=3&dc<Ntfq,xOT6o');
define('NONCE_SALT', 'e)0[B?1,Nks?*Y/(YT6R!- es-2_5c:|caGt|2&+o{(^wVxnNF;e}%Ph;cE]5DSf');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'cp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

