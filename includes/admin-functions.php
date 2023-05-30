<?php
/**
 * Attention Seekers admin functions.
 *
 * @package Attention Seekers theme
 */

/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @return void
 */
function lizzyvandrom_theme_fail_load_admin_notice() {
	// Leave to Elementor Pro to manage this.
	if ( function_exists( 'elementor_pro_load_plugin' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
		return;
	}

	if ( 'true' === get_user_meta( get_current_user_id(), '_lizzyvandrom_theme_install_notice', true ) ) {
		return;
	}

	$plugin = 'elementor/elementor.php';

	$installed_plugins = get_plugins();

	$is_elementor_installed = isset( $installed_plugins[ $plugin ] );

	if ( $is_elementor_installed ) {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$message = __( 'This is an Lizzy van Drom theme designed to work perfectly with Elementor Page Builder plugin.', 'lizzyvandrom-theme' );

		$button_text = __( 'Activate Elementor', 'lizzyvandrom-theme' );
		$button_link = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
	} else {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		$message = __( 'This is an Attention Seekers theme. We recommend you use it together with Elementor Page Builder plugin, they work perfectly together!', 'lizzyvandrom-theme' );

		$button_text = __( 'Install Elementor', 'lizzyvandrom-theme' );
		$button_link = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
	}

	?>
	<style>
		.notice.lizzyvandrom-theme-notice {
			border-left-color: #FF3843 !important;
			padding: 20px;
		}
		.rtl .notice.lizzyvandrom-theme-notice {
			border-right-color: #FF3843 !important;
		}
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-inner {
			display: table;
			width: 100%;
		}
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-inner .lizzyvandrom-theme-notice-icon,
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-inner .lizzyvandrom-theme-notice-content,
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-inner .lizzyvandrom-theme-install-now {
			display: table-cell;
			vertical-align: middle;
		}
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-icon {
			color: #FF3843;
			font-size: 50px;
			width: 50px;
		}
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-content {
			padding: 0 20px;
		}
		.notice.lizzyvandrom-theme-notice p {
			padding: 0;
			margin: 0;
		}
		.notice.lizzyvandrom-theme-notice h3 {
			margin: 0 0 5px;
		}
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-install-now {
			text-align: center;
		}
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-install-now .lizzyvandrom-theme-install-button {
			padding: 5px 30px;
			height: auto;
			line-height: 20px;
			text-transform: capitalize;
		}
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-install-now .lizzyvandrom-theme-install-button i {
			padding-right: 5px;
		}
		.rtl .notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-install-now .lizzyvandrom-theme-install-button i {
			padding-right: 0;
			padding-left: 5px;
		}
		.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-install-now .lizzyvandrom-theme-install-button:active {
			transform: translateY(1px);
		}
		@media (max-width: 767px) {
			.notice.lizzyvandrom-theme-notice {
				padding: 10px;
			}
			.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-inner {
				display: block;
			}
			.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-inner .lizzyvandrom-theme-notice-content {
				display: block;
				padding: 0;
			}
			.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-inner .lizzyvandrom-theme-notice-icon,
			.notice.lizzyvandrom-theme-notice .lizzyvandrom-theme-notice-inner .lizzyvandrom-theme-install-now {
				display: none;
			}
		}
	</style>
	<script>jQuery( function( $ ) {
			$( 'div.notice.lizzyvandrom-theme-install-elementor' ).on( 'click', 'button.notice-dismiss', function( event ) {
				event.preventDefault();

				$.post( ajaxurl, {
					action: 'lizzyvandrom_theme_set_admin_notice_viewed'
				} );
			} );
		} );</script>
	<div class="notice updated is-dismissible lizzyvandrom-theme-notice lizzyvandrom-theme-install-elementor">
		<div class="lizzyvandrom-theme-notice-inner">
			<div class="lizzyvandrom-theme-notice-icon">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/elementor-logo.png' ); ?>" alt="Elementor Logo" />
			</div>

			<div class="lizzyvandrom-theme-notice-content">
				<h3><?php esc_html_e( 'Thanks for installing our Attention Seekers theme!', 'lizzyvandrom-theme' ); ?></h3>
				<p>
					<p><?php echo esc_html( $message ); ?></p>
					<a href="https://go.elementor.com/hello-theme-learn/" target="_blank"><?php esc_html_e( 'Learn more about Elementor', 'lizzyvandrom-theme' ); ?></a>
				</p>
			</div>

			<div class="lizzyvandrom-theme-install-now">
				<a class="button button-primary lizzyvandrom-theme-install-button" href="<?php echo esc_attr( $button_link ); ?>"><i class="dashicons dashicons-download"></i><?php echo esc_html( $button_text ); ?></a>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Set Admin Notice Viewed.
 *
 * @return void
 */
function ajax_lizzyvandrom_theme_set_admin_notice_viewed() {
	update_user_meta( get_current_user_id(), '_lizzyvandrom_theme_install_notice', 'true' );
	die;
}

add_action( 'wp_ajax_lizzyvandrom_theme_set_admin_notice_viewed', 'ajax_lizzyvandrom_theme_set_admin_notice_viewed' );

if ( ! did_action( 'elementor/loaded' ) ) {
	add_action( 'admin_notices', 'lizzyvandrom_theme_fail_load_admin_notice' );
}
