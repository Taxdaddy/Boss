<?php
	wp_enqueue_style( 'plugin-install' );
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
	$companion_plugins = $this->companion_plugins;
	$show_success_notice = $this->all_required_plugins_installed();

	if($show_success_notice) :
		?>
		<div class="action-tab success">
			<h3><?php echo esc_html($this->strings['req_plugins_installed']); ?></h3>
			<a class="button button-primary" href="<?php echo esc_url(admin_url('themes.php?page=zigcy_options')); ?>">
				<?php echo esc_html($this->strings['customize_theme_btn']); ?>
			</a>
		</div>
		<?php
	else :

		foreach($companion_plugins as $plugin) :
			if( $plugin['host_type'] == 'bundled' ) {

				$status = $this->get_plugin_active($plugin);

				switch($status) {
					case 'install' :
						$btn_class = 'install-offline button';
						$label = $this->strings['install_n_activate'];
						$link = $plugin['location'];
						$info = $plugin['info'];
						break;

					case 'inactive' :
						$btn_class = 'deactivate button';
						$label = $this->strings['deactivate'];
						$link = '#';
						$info = $plugin['info'];
						break;

					case 'active' :
						$btn_class = 'activate button button-primary';
						$label = $label = $this->strings['activate'];
						$link = '#';
						$info = $plugin['info'];
						break;
				}

				?>
				<div class="action-tab warning">
					<h3>
						<?php echo esc_html($label).' : '.esc_html($plugin['name']); ?>
					</h3>
					<p>
						<?php
							/* translators: %s : plugin info */
							echo esc_html($info);
						?>
					</p>

					<span class="plugin-action-btn plugin-card-<?php echo esc_attr($plugin['slug']); ?>" action_button>
						<a class="<?php echo esc_attr($btn_class); ?>" data-host-type="<?php echo esc_attr($plugin['host_type']); ?>" data-file='<?php echo esc_attr($plugin['filename']); ?>' data-class="<?php echo esc_attr($plugin['class']); ?>" data-slug="<?php echo esc_attr($plugin['slug']); ?>" href="<?php echo esc_attr($link); ?>"><?php echo esc_html($label); ?></a>
					</span>
				</div>
				<?php
			} elseif( $plugin['host_type'] == 'remote' ) {
				$status = $this->get_plugin_active($plugin);

				switch($status) {
					case 'install' :
						$btn_class = 'install-offline button';
						$label = $this->strings['install_n_activate'];
						$link = $plugin['location'];
						$info = $plugin['info'];
						break;

					case 'inactive' :
						$btn_class = 'deactivate button';
						$label = $this->strings['deactivate'];
						$link = '#';
						$info = $plugin['info'];
						break;

					case 'active' :
						$btn_class = 'activate button button-primary';
						$label = $this->strings['activate'];
						$link = '#';
						$info = $plugin['info'];
						break;
				}

				?>
				<div class="action-tab warning">
					<h3>
						<?php
							/* translators: %1$s - label, %2$s - plugin name */
							echo esc_html($label). ' : '. esc_html($plugin['name']);
						?>
					</h3>
					<p>
						<?php
							/* translators: %s : plugin info */
							echo esc_html($info);
						?>
					</p>

					<span class="plugin-action-btn plugin-card-<?php echo esc_attr($plugin['slug']); ?>" action_button>
						<a class="<?php echo esc_attr($btn_class); ?>" data-host-type="<?php echo esc_attr($plugin['host_type']); ?>" data-file='<?php echo esc_attr($plugin['filename']); ?>' data-class="<?php echo esc_attr($plugin['class']); ?>" data-slug="<?php echo esc_attr($plugin['slug']); ?>" href="<?php echo esc_attr($link); ?>"><?php echo esc_html($label); ?></a>
					</span>
				</div>
				<?php
			} else {
				
				$info = $this->call_plugin_api($plugin['slug']);
				if(!isset($info->errors)) :

					$icon_url = $this->check_for_icon($info->icons);
					$status = $this->get_plugin_active($plugin);
					$btn_url = $this->generate_plugin_url($status, $plugin);

					switch($status) {
						case 'install' :
							$btn_class = 'install button';
							$label = $this->strings['install_n_activate'];
							break;

						case 'inactive' :
							$btn_class = 'deactivate button';
							$label = $this->strings['deactivate'];
							break;

						case 'active' :
							$btn_class = 'activate button button-primary';
							$label = $label = $this->strings['activate'];
							break;
					}
					$path = WP_PLUGIN_DIR.'/'.esc_attr($plugin['slug']).'/'.esc_attr($plugin['filename']);
					?>

					<div class="action-tab warning">
						<h3>
							<?php
								/* translators: %s : plugin name */
								echo esc_html__('Install', 'the100'). ' : '. esc_html($info->name). esc_html__('Plugin', 'the100');
							?>
						</h3>
						<p><?php echo esc_html($plugin['info']); ?></p>

						<span class="plugin-action-btn plugin-card-<?php echo esc_attr($plugin['slug']); ?>" action_button>
							<a class="<?php echo esc_attr($btn_class); ?>" data-host-type="<?php echo esc_attr($plugin['host_type']); ?>" data-file="<?php echo esc_attr($plugin['filename']); ?>" data-class="<?php echo esc_attr($plugin['class']); ?>" data-slug="<?php echo esc_attr($plugin['slug']); ?>" href="<?php echo esc_attr($btn_url); ?>"><?php echo esc_html($label); ?></a>
						</span>
					</div>

				<?php
				endif;
			}

		endforeach;
	endif;