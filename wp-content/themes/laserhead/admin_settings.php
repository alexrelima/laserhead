<?php

add_action( 'init', 'wptester_admin_init' );
add_action( 'admin_menu', 'wptester_settings_page_init' );

function wptester_admin_init() {
	$settings = get_option( "wptester_theme_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'wptester_intro' => 'Some intro text for the home page',
			'wptester_tag_class' => false,
			'wptester_ga' => false,
			'telefones_telefone' => false
			);
		add_option( "wptester_theme_settings", $settings, '', 'yes' );
	}	
}

function wptester_settings_page_init() {
	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	$settings_page = add_theme_page( $theme_data['Name']. ' Theme Settings', ' Opções do Tema', 'edit_theme_options', 'theme-settings', 'wptester_settings_page' );
	add_action( "load-{$settings_page}", 'wptester_load_settings_page' );
}

function wptester_load_settings_page() {
	if ( $_POST["wptester-settings-submit"] == 'Y' ) {
		check_admin_referer( "wptester-settings-page" );
		wptester_save_theme_settings();
		$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
		wp_redirect(admin_url('themes.php?page=theme-settings&'.$url_parameters));
		exit;
	}
}

function wptester_save_theme_settings() {
	global $pagenow;
	$settings = get_option( "wptester_theme_settings" );
	
	if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
		if ( isset ( $_GET['tab'] ) )
			$tab = $_GET['tab']; 
		else
			$tab = 'contatos'; 

		switch ( $tab ){ 
			
			case 'contatos' : 
			$settings['contatos_ddd']  = $_POST['contatos_ddd'];
			$settings['contatos_telefone']  = $_POST['contatos_telefone'];
			$settings['contatos_telefone2']  = $_POST['contatos_telefone2'];
			$settings['contatos_telefone3']  = $_POST['contatos_telefone3'];
			$settings['contatos_email']  = $_POST['contatos_email'];
			$settings['contatos_pais']  = $_POST['contatos_pais'];
			$settings['contatos_estado']  = $_POST['contatos_estado'];
			$settings['contatos_endereco']  = $_POST['contatos_endereco'];
			$settings['contatos_complemento']  = $_POST['contatos_complemento'];
			$settings['contatos_bairro']  = $_POST['contatos_bairro'];
			$settings['contatos_cidade']  = $_POST['contatos_cidade'];
			$settings['contatos_uf']  = $_POST['contatos_uf'];						
			break;
			case 'redes-sociais' : 			
			$settings['twitter']  = $_POST['twitter'];
			$settings['instagram']  = $_POST['instagram'];
			break;
		}
	}
	
	if( !current_user_can( 'unfiltered_html' ) ){
		if ( $settings['wptester_ga']  )
			$settings['wptester_ga'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['wptester_ga'] ) ) );
		if ( $settings['wptester_intro'] )
			$settings['wptester_intro'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['wptester_intro'] ) ) );

	}

	$updated = update_option( "wptester_theme_settings", $settings );
}

function wptester_admin_tabs( $current = 'homepage' ) { 
	$tabs = array('contatos' => 'Contatos', 'redes-sociais' => 'Redes Sociais'); 
	$links = array();
	echo '<div id="icon-themes" class="icon32"><br></div>';
	echo '<h2 class="nav-tab-wrapper">';
	foreach( $tabs as $tab => $name ){
		$class = ( $tab == $current ) ? ' nav-tab-active' : '';
		echo "<a class='nav-tab$class' href='?page=theme-settings&tab=$tab'>$name</a>";

	}
	echo '</h2>';
}

function wptester_settings_page() {
	global $pagenow;
	$settings = get_option( "wptester_theme_settings" );
	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	?>
	
	<div class="wrap">
		<h2>Opções do Tema</h2>
		
		<?php
		if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Opções de tema.</p></div>';

		if ( isset ( $_GET['tab'] ) ) wptester_admin_tabs($_GET['tab']); else wptester_admin_tabs('homepage');
		?>

		<div id="poststuff">
			<form method="post" action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>">
				<?php
				wp_nonce_field( "wptester-settings-page" ); 
				
				if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 

					if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
					else $tab = 'contatos'; 
					
					echo '<table class="form-table">';
					switch ( $tab ){					
						case 'contatos' : 
						?>
						<tr>
							<th><label for="contatos_ddd">DDD:</label></th>
							<td>
								<input type="text" id="contatos_ddd" name="contatos_ddd" value="<?php echo esc_html( stripslashes( $settings["contatos_ddd"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="telefones_telefone">Telefone:</label></th>
							<td>
								<input type="text" id="contatos_telefone" name="contatos_telefone" value="<?php echo esc_html( stripslashes( $settings["contatos_telefone"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_telefone2">Telefone:</label></th>
							<td>
								<input type="text" id="contatos_telefone2" name="contatos_telefone2" value="<?php echo esc_html( stripslashes( $settings["contatos_telefone2"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_telefone3">Telefone:</label></th>
							<td>
								<input type="text" id="contatos_telefone3" name="contatos_telefone3" value="<?php echo esc_html( stripslashes( $settings["contatos_telefone3"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_email">E-mail:</label></th>
							<td>
								<input type="text" id="contatos_email" name="contatos_email" value="<?php echo esc_html( stripslashes( $settings["contatos_email"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_pais">Pais:</label></th>
							<td>
								<input type="text" id="contatos_pais" name="contatos_pais" value="<?php echo esc_html( stripslashes( $settings["contatos_pais"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_estado">Estado:</label></th>
							<td>
								<input type="text" id="contatos_estado" name="contatos_estado" value="<?php echo esc_html( stripslashes( $settings["contatos_estado"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_endereco">Endereço:</label></th>
							<td>
								<input type="text" id="contatos_endereco" name="contatos_endereco" value="<?php echo esc_html( stripslashes( $settings["contatos_endereco"] ) ); ?>">
								<span class="description">Incluir o número</span>
							</td>
						</tr>
						<tr>
							<th><label for="contatos_complemento">Complemento:</label></th>
							<td>
								<input type="text" id="contatos_complemento" name="contatos_complemento" value="<?php echo esc_html( stripslashes( $settings["contatos_complemento"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_bairro">Bairro:</label></th>
							<td>
								<input type="text" id="contatos_bairro" name="contatos_bairro" value="<?php echo esc_html( stripslashes( $settings["contatos_bairro"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_cidade">Cidade:</label></th>
							<td>
								<input type="text" id="contatos_cidade" name="contatos_cidade" value="<?php echo esc_html( stripslashes( $settings["contatos_cidade"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="contatos_uf">UF:</label></th>
							<td>
								<input type="text" id="contatos_uf" name="contatos_uf" value="<?php echo esc_html( stripslashes( $settings["contatos_uf"] ) ); ?>">
							</td>
						</tr>

						<?php
						break;

						case 'redes-sociais' : 
						?>
						<tr>
							<th><label for="twitter">Twitter:</label></th>
							<td>
								<input type="text" id="twitter" name="twitter" value="<?php echo esc_html( stripslashes( $settings["twitter"] ) ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="instagram">Instagram:</label></th>
							<td>
								<input type="text" id="instagram" name="instagram" value="<?php echo esc_html( stripslashes( $settings["instagram"] ) ); ?>">
							</td>
						</tr>
						<?php
						break;				

					}
					echo '</table>';
				}
				?>
				<p class="submit" style="clear: both;">
					<input type="submit" name="Submit"  class="button-primary" value="Atualizar" />
					<input type="hidden" name="wptester-settings-submit" value="Y" />
				</p>
			</form>
			
			<p>Site desenvolvido por Agência Imaginy</p>
		</div>

	</div>
	<?php
}