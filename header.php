<?php
/*
 WARNING: This file is part of the core Genesis framework. DO NOT edit
 this file under any circumstances. Please do all modifications
 in the form of a child theme.
 */

/**
 * Handles the header structure.
 *
 * This file is a core Genesis file and should not be edited.
 *
 * @category Genesis
 * @package  Templates
 * @author   StudioPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.studiopress.com/themes/genesis
 */

do_action( 'genesis_doctype' );
do_action( 'genesis_title' );
do_action( 'genesis_meta' );

wp_head(); /** we need this for plugins **/
?>
</head>
<body <?php body_class(); ?>>
<img src="<?php bloginfo('url');?>/wp-content/themes/towncountry-child/images/town.png" id="cover">
<?php
do_action( 'genesis_before' );
?>
<div id="wrap">
	<div id="content-grunge-paper">
    <img src="<?php bloginfo('url');?>/wp-content/themes/towncountry-child/images/left-corner-swirl.png" id="left-corner-swirl">
<?php
do_action( 'genesis_before_header' );
do_action( 'genesis_header' );
do_action( 'genesis_after_header' );

?>

   <img src="<?php bloginfo('url');?>/wp-content/themes/towncountry-child/images/right-corner-swirl.png" id="right-corner-swirl">


    <header>
    	<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('url');?>/wp-content/themes/towncountry-child/images/logo.png" id="logo" alt="<?php bloginfo('name')."". bloginfo('description'); ?>"></a>
        <div id="tagline"><?php $honestscales = get_bloginfo('description'); echo $honestscales; ?></div>
    </header>

<?php
echo '<div id="inner">';
genesis_structural_wrap( 'inner' );
