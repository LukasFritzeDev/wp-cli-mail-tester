<?php

namespace WP_CLI\MailTest;

use WP_CLI;

if ( ! class_exists( '\WP_CLI' ) ) {
	return;
}

$wpcli_mail_test_autoloader = __DIR__ . '/vendor/autoload.php';

if ( file_exists( $wpcli_mail_test_autoloader ) ) {
	require_once $wpcli_mail_test_autoloader;
}

WP_CLI::add_command( 'mail test', MailTestCommand::class );
