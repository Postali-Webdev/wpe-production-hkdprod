<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/

if(is_tree('96')) { 
    $silo = 'bronx';
} elseif(is_tree('106')) { 
    $silo = 'brooklyn';
} elseif(is_tree('110')) { 
    $silo = 'queens';
} elseif(is_tree('17923')) { 
    $silo = 'espanol';
} else { $silo = 'global';
}

function __language_attributes($lang){

    if(is_tree('17923')) {
        return 'lang="es"';
    } else {
        return 'lang="en-US"';
    }
  }
  
  add_filter('language_attributes', '__language_attributes');

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NG4R62W');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<?php 
if( is_page_template(['page-landing.php']) || get_post_type() === 'blogesp' || get_post_type() == 'post' ) {
    if (has_post_thumbnail()) {
    $attachment_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
        <link rel="preload" as="image" href="<?php echo $attachment_image; ?>.webp">
    <?php 
    }
} 
?>

<?php if (get_field('banner_header_photo')) { 
$banner_img = get_field('banner_header_photo'); ?>
    <link rel="preload" as="image" href="<?php echo $banner_img['url']; ?>.webp">
<?php } ?>

<!-- Preload Font -->
<link rel="preload" as="font" type="font/woff2" href="/wp-content/themes/postali-child/assets/fonts/nunitosans/nunitosans-variable.woff2" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="/wp-content/themes/postali-child/assets/fonts/nunitosans/nunitosans-variable-italic.woff2" crossorigin>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet"> -->
<?php if (is_page_template('front-page.php')) { ?>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
<?php } ?>

</head>

<div class="site-border"></div>
<a class="skip-link" href='#main-content'>Skip to Main Content</a>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NG4R62W"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<header id="header">
		<div id="header-top" class="container">
            <div id="header-top_left">
            <?php if (is_tree('17923') || is_post_type_archive('blogesp') || is_singular('blogesp') || is_singular('attorneysesp') || is_post_type_archive('resultsesp') || is_singular('resultsesp') || is_tax('results_attorney_espanol') || is_tax('results_category_esp')) { ?>
				<a href="/espanol/" class="custom-logo-link" rel="home">
            <?php } else { ?>
                <a href="/" class="custom-logo-link" rel="home">
            <?php } ?>
                <img src="/wp-content/uploads/2024/08/HKD-Logo-final-Personal-Injury-Lawyers-Horizontal.jpg" class="custom-logo" alt="HKD logo" decoding="async"></a>
            </div>
			
			<div id="header-top_right">
                <div class="translate">
                <?php
                    $en_link = get_field('english_page');
                    if( $en_link )  {
                            echo '<a class="esp" href="' . $en_link . '" title="English Translation">ENG</a>';
                        }
                        else {
                            echo '<a class="esp" href="/" title="English Translation">ENG</a>';
                        }
                    ?>
                    <span>&nbsp;|&nbsp;</span>
                    <?php
                    $sp_link = get_field('spanish_page');
                    if( $sp_link )  {
                            echo '<a class="esp" href="' . $sp_link . '" title="En Español Translation">ESP</a>';
                        }
                        else {
                            echo '<a class="esp" href="/espanol/" title="En Español Translation">ESP</a>';
                        }
                ?>
                </div>
				<div id="header-top_right_menu">
                    <?php if(!is_404()) { ?>
                    <?php if (is_tree('17923') || is_post_type_archive('blogesp') || is_singular('blogesp') || is_singular('attorneysesp') || is_post_type_archive('resultsesp') || is_singular('resultsesp') || is_tax('results_attorney_espanol') || is_tax('results_category_esp')) { //spanish menu ?>
                        <div class="desktop-nav-container">
                            <nav role="navigation">
                            <?php
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav-esp'
                            );
                            wp_nav_menu( $args );
                            ?>
                            </nav>

                            <ul class="menu search">
                                <li class="menu-item menu-item-search search-holder">
                                    <form class="navbar-form-search" role="search" method="get" action="/">
                                        <div class="search-form-container hdn" id="search-input-container">
                                            <div class="search-input-group">
                                                <div class="form-group">
                                                <input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-search" id="search-button"><span class="icon-search-icon" aria-hidden="true"></span></button>
                                    </form>	
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div class="desktop-nav-container">
                            <?php    
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav-about-global'
                            );
                            wp_nav_menu( $args );
                            ?>

                            <?php    
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav-practice-' . $silo . ''
                            );
                            wp_nav_menu( $args );
                            ?>

                            <?php    
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav-main-global'
                            );
                            wp_nav_menu( $args );
                            ?>

                            <ul class="menu contact">
                                <li class="nav-contact">
                                    <a href="/contact/">CONTACT</a>
                                </li>
                            </ul>

                            <ul class="menu search">
                                <li class="menu-item menu-item-search search-holder">
                                    <form class="navbar-form-search" role="search" method="get" action="/">
                                        <div class="search-form-container hdn" id="search-input-container">
                                            <div class="search-input-group">
                                                <div class="form-group">
                                                <input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-search" id="search-button"><span class="icon-search-icon" aria-hidden="true"></span></button>
                                    </form>	
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php } elseif(is_404()) { ?>
                        <div class="desktop-nav-container">
                        <?php
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav'
                            );
                            wp_nav_menu( $args );
                        ?>
                        </div>
                    <?php } ?>
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header> 

    <span id="main-content"></span>