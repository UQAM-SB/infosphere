<?php
/*
 *  Widget - Evenements
 */
function evenements_widget() {
	include('evenements-widget.php' );
	register_widget( 'WP_Widget_evenements' );
}
add_action( 'widgets_init', 'evenements_widget' );

function evenements_admin_assets() {
	$current_screen = get_current_screen();
	if( $current_screen->id === "widgets" ) {

		wp_enqueue_style( 'selectize', 'https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css', false, '0.12.6', 'all' );
		wp_enqueue_script( 'selectize-standalone', 'https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js', array(), '0.12.6', false );
	}
}
add_action( 'admin_enqueue_scripts', 'evenements_admin_assets' );

/*
 * debug_queries: evenements_uqam
 * dev: afficher les valeurs brutes du widget, source caligram
 * flush: delete la cache
 * ex: ?evenements_uqam=flush
 */
function evenements_debug_queries( $vars ) {
	$vars[] = "evenements_uqam";
	return $vars;
}
add_filter( 'query_vars', 'evenements_debug_queries' );

/*
 * Recherche par nom des Groupes et Tags de evenements (caligram)
 * /caligram/v1/organizations_tags/{uqam||esg}/{organizations||tags}/{recherche par nom}
 */
add_action('rest_api_init', function(){
	register_rest_route('caligram/v1', 'organizations_tags/(?P<compte>[\w]+)?(?:/(?P<organizations_tags>[\w]+))?(?:/(?P<search>[\w].+))', array(
		'methods' => WP_REST_Server::READABLE,
		'callback' => 'get_evenements_organizations_tags',
		'args' => [
			'compte' => [
				'default'           => 'uqam',
				'required'          => true
			],
			'organizations_tags' => [
				'default'           => 'organizations',
				'required'          => true
			],
			'search' => [
				'default'           => null,
				'required'          => true
			]
		],
		'permission_callback' => '__return_true'
	));
	log_events('in action');
});
add_action('rest_api_init', function(){
	register_rest_route('caligram/v1', 'organizations_tags/', array(
		'methods' => WP_REST_Server::READABLE,
		'callback' => 'get_evenements_organizations_tags',
		'args' => [
			'compte' => [
				'default'           => null,
				'required'          => false,
				'validate_callback' => 'sanitize_text_field'
			],
			'organizations_tags' => [
				'default'           => null,
				'required'          => false,
				'validate_callback' => 'sanitize_text_field'
			],
			'search' => [
				'default'           => null,
				'required'          => false,
				'validate_callback' => 'sanitize_text_field'
			]
		],
		'permission_callback' => '__return_true'
	));
});

function get_evenements_organizations_tags($req){

	$req_search = urldecode($req['search']);

	switch( $req['compte'] ){//compte
		case 'uqam':
			$compte = 'https://evenements.uqam.ca/';
			break;
		case 'esg':
			$compte = 'https://evenements.esg.uqam.ca/';
			break;
		default:
			$compte = 'https://evenements.uqam.ca/';
			break;
	}
	switch( $req['organizations_tags'] ){//organizations_tags
		case 'tags':
			$organizations_tags = 'tags?name=' . $req_search . '&per=200';
			break;
		case 'organizations':
			$organizations_tags = 'organizations?per=500';
			break;
		default:
			$organizations_tags = 'organizations?per=500';
			break;
	}

	//cURL
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$compte . 'api/' . $organizations_tags);
	$org_data = curl_exec($ch);
	curl_close($ch);

	//format results
	$o_data = json_decode($org_data, true);
	$resultats = array();
	foreach($o_data['data'] as $result){
		if(preg_match("/{$req_search}/i", $result['name'])) {
			log_events($result['name']);
			$resultats[] = array(
				'name' => $result['name'],
				'id' => $result['id']
			);
		}
	}
	return $resultats;
}

/**
 *  Fonction pour logger/débugger en LOCAL
 */
function log_events($message) {
	if (WP_DEBUG === true) {
		if (is_array($message) || is_object($message)) {
			error_log(print_r($message, true));
		} else {
			error_log($message);
		}
	}
}