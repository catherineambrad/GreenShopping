<?php
$my_post   = get_post( $id );
$id_author = $my_post->post_author;

$users = get_users( array(
	'role'   => '',
	'fields' => [ 'ID' ],
) );

$users_id = wp_list_pluck( $users, 'ID' );

if ( is_author() && $id_author == $users_id[0] ) {
	status_header( 410 );
}

?>

<html>
<head>
    <title>410 Gone</title>
</head>
<body>
<main class="page-archive" style="display: flex; justify-content: center; align-items: center; height: 100%;">
    <h1 style="font-size: 25rem; margin: 0; text-align: center;">410 Gone</h1>
</main>
</body>
</html>
