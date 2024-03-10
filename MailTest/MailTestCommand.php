<?php

namespace WP_CLI\MailTest;

use WP_CLI;
use WP_CLI_Command;

class MailTestCommand extends WP_CLI_Command {

	/**
	 * Send a mail using [wp_mail](https://developer.wordpress.org/reference/functions/wp_mail/)
	 *
	 * A success log does not automatically mean that the user received the email successfully.
	 * It just only means that the method used was able to process the request without any errors.
	 *
	 * ## OPTIONS
	 *
	 * <recipient>
	 * : The recipient the mail should be sent to
	 *
	 * ## EXAMPLES
	 *
	 *     # Send mail to hello@world.com
	 *     $ wp mail test hello@world.com
	 *
	 * @when after_wp_load
	 *
	 * @param array $args       Indexed array of positional arguments.
	 * @param array $assoc_args Associative array of associative arguments.
	 */
	public function __invoke( $args, $assoc_args ) {
		list( $recipient ) = $args;

		$siteUrl = get_site_url();

		WP_CLI::log( "Sending mail to $recipient" );
		$success = wp_mail( $recipient, 'WP Test Mail', "This is a test mail send from $siteUrl" );
		if ( $success ) {
			WP_CLI::success( 'Mail sent!' );
		} else {
			WP_CLI::error( 'Mail sending failed!' );
		}
	}
}
