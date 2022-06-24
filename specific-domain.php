## THIS FUNCTION WILL ALLOW TO REGISTRER SPECIFIC DOMAIN EMAIL'S USERS.
add_filter('wc_memberships_grant_access_to_free_membership','mohammad_restrict_domains', 10, 3);
function mohammad_restrict_domains( $bool, $user_args ) {
  
	$whitelist = array('agbarr.co.uk'); // here you can add more domain to allow for user registration
    $user_data = get_user_by('id', $user_args['user_id']); print_r($user_data);
    $email = $user_data->user_email; //echo $email; die($email);
	if ( is_email($email) ) {
		$parts = explode('@', $email);
		$domain = $parts[count($parts)-1];
		if ( !in_array(strtolower($domain), $whitelist) ) {
			$bool = false;
		}
	}
	return $bool;
}
