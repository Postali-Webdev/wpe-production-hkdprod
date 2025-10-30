<?php
/*
Template Name: PPC Landing
*/

/* declare variables */
$headerText = get_field('header_text_color');
$benefitsBG = get_field('benefits_background_color');
$benefitsText = get_field('benefits_txt_color');
$testimonialsBG = get_field('testimonials_background_color');
$testimonialsText = get_field('testimonials_txt_color');
$aboutBG = get_field('about_background_color');
$aboutText = get_field('about_txt_color');
$aboutColumns = get_field('attorneys_panel_layout');
	if ($aboutColumns == '5050') {
		$column1 = "50";
		$column2 = "50";
	} elseif ($aboutColumns == '6633') {
		$column1 = "66";
		$column2 = "33";
	}
$awardsBG = get_field('awards_background_color');
$resultsBG = get_field('results_background_color');
$resultsText = get_field('results_txt_color');
$ctaBG = get_field('cta_background_color');
$ctaText = get_field('cta_txt_color');
$pageFooterBG = get_field('page_footer_background_color');
$pageFooterText = get_field('page_footer_txt_color');

$logo_img = get_field('testimonial_logo');

?>
<?php get_header(); ?>

<div class="ppc-landing">

<?php $background_img = get_field('header_background_image'); ?>

    <section id="header" style="background-image:url(<?php echo esc_url($background_img['url']); ?>);">
		<div class="container">
			<div class="columns">
				<div class="column-50">
                    <?php if( !empty( $logo_img ) ): ?>
						<img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img['alt']); ?>" class="testimonial-img" />
					<?php endif; ?>
                    <p class="header-quote" style="color:<?php echo $headerText; ?>"><?php the_field('header_quote'); ?></p>
                    <p class="header-quote-author" style="color:#555"><?php the_field('header_quote_author'); ?></p>
                    <div class="mobile-spacer"></div>
                    <h1 style="color:<?php echo $headerText; ?>"><?php the_field('header_headline'); ?></h1>
                    <div class="spacer-15"></div>
					<p class="header-intro" style="color:<?php echo $headerText; ?>"><?php the_field('header_value_proposition'); ?></p>
					<div class="spacer-30"></div>
					<p class="header-cta-text" style="color:<?php echo $headerText; ?>"><?php the_field('header_cta_text'); ?></p>
					<a href="tel:<?php the_field('header_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('header_cta_phone'); ?></a>
                    <p class="header-cta-subtext" style="color:<?php echo $headerText; ?>"><em><?php the_field('header_cta_subtext'); ?></em></p>
				</div>
			</div>
		<div>
	</section>  

	<section id="benefits" style="background-color:<?php echo $benefitsBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-full centered">
					<h2 style="color:<?php echo $benefitsText; ?>"><?php the_field('benefits_headline'); ?></h2>
				</div>
				<div class="spacer-30"></div>
                <?php $n=1; ?>
				<?php if( have_rows('benefits_repeater') ): ?>
				<?php while( have_rows('benefits_repeater') ) : the_row(); ?>
					<div class="column-33">
                        <span class="benefit-number"><?php echo $n; ?></span>
						<h4 style="color:<?php echo $benefitsText; ?>"><?php the_sub_field('benefit_title'); ?></h4>
						<p style="color:<?php echo $benefitsText; ?>"><?php the_sub_field('benefit_copy'); ?></p>
					</div>
                    <?php $n++; ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		<div>
	</section>

    <section id="on-page-cta">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="left">
                        <p class="benefits-cta-headline" style="color:<?php echo $benefitsText; ?>"><?php the_field('benefits_cta_headline'); ?></p>
                        <p class="header-cta-text" style="color:<?php echo $benefitsText; ?>"><?php the_field('header_cta_text'); ?></p>
                    </div>
                    <div class="right">
                        <a href="tel:<?php the_field('header_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('header_cta_phone'); ?></a>
                        <p class="header-cta-subtext" style="color:<?php echo $headerText; ?>"><em><?php the_field('header_cta_subtext'); ?></em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section id="testimonials" style="background-color:<?php echo $testimonialsBG; ?>">
		<div class="container skinny">
			<div class="columns">
				<div class="column-full centered">
					<h2 style="color:<?php echo $testimonialsText; ?>"><?php the_field('testimonials_headline'); ?></h2>
					<?php if( !empty( $logo_img ) ): ?>
						<img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img['alt']); ?>" class="testimonial-img" />
					<?php endif; ?>
				</div>
                <div class="spacer-30"></div>
				<div class="column-full centered quote">
                    <h3 style="color:<?php echo $testimonialsText; ?>"><?php the_field('testimonial_headline'); ?></h3>
					<p style="color:<?php echo $testimonialsText; ?>"><?php the_field('testimonial_copy'); ?></p>
					<p style="color:#24AAE2" class="testimonial_author"><?php the_field('testimonial_author'); ?></p>
				</div>
			</div>
		<div>
	</section>

	<section id="about" style="background-color:<?php echo $aboutBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-full centered">
					<h2 style="color:<?php echo $aboutText; ?>"><?php the_field('about_the_firm_headline'); ?></h2>
				</div>
				<div class="spacer-60"></div>
				<div class="column-<?php echo $column1; ?>">
					<p style="color:<?php echo $aboutText; ?>"><?php the_field('about_the_firm_copy'); ?></p>
				</div>
				<div class="column-<?php echo $column2; ?>" id="attorney-img">
					<div class="attorney_blocks">
					<?php if( have_rows('attorneys_repeater') ): ?>
					<?php while( have_rows('attorneys_repeater') ) : the_row(); ?>
						<a href="<?php the_sub_field('attorney_page_link'); ?>">
							<?php $attorney_img = get_sub_field('attorney_image'); ?>
							<?php if( !empty( $attorney_img ) ): ?>
								<img src="<?php echo esc_url($attorney_img['url']); ?>" alt="<?php echo esc_attr($attorney_img['alt']); ?>" class="attorney-img" />
							<?php endif; ?>
						</a>
					<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		<div>
	</section>

	<section id="our-awards" style="background-color:<?php echo $awardsBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-full centered">
				<?php if( have_rows('awards_repeater') ): ?>
				<?php while( have_rows('awards_repeater') ) : the_row(); ?>
				<?php $award_img = get_sub_field('award_image'); ?>
					<?php if( !empty( $award_img ) ): ?>
						<img src="<?php echo esc_url($award_img['url']); ?>" alt="<?php echo esc_attr($award_img['alt']); ?>" class="award-img" />
					<?php endif; ?>
				<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

    <section id="on-page-cta">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="left">
                        <p class="benefits-cta-headline" style="color:<?php echo $benefitsText; ?>"><?php the_field('benefits_cta_headline'); ?></p>
                        <p class="header-cta-text" style="color:<?php echo $benefitsText; ?>"><?php the_field('header_cta_text'); ?></p>
                    </div>
                    <div class="right">
                        <a href="tel:<?php the_field('header_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('header_cta_phone'); ?></a>
                        <p class="header-cta-subtext" style="color:<?php echo $headerText; ?>"><em><?php the_field('header_cta_subtext'); ?></em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section id="results" style="background-color:<?php echo $resultsBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-66 center">
                    <h2 style="color:<?php echo $resultsText; ?>"><?php the_field('results_headline'); ?></h2>
                    <div class="spacer-60 mobile"></div>
                    <span class="featured">Featured Result</span>
                    <p style="color:<?php echo $resultsText; ?>"><?php the_field('results_copy'); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section id="footer-cta" style="background-color:<?php echo $ctaBG; ?>">
		<div class="container skinny">
			<div class="columns">
				<div class="column-50 first">
					<h2 style="color:<?php echo $ctaText; ?>"><?php the_field('footer_value_proposition'); ?></h2>
					<p style="color:<?php echo $ctaText; ?>"><strong><?php the_field('footer_incentive_offer'); ?></strong></p>
					<a href="tel:<?php the_field('footer_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('footer_cta_phone'); ?></a>
				</div>
				<div class="column-50">
					<p style="color:<?php echo $ctaText; ?>"><?php the_field('form_cta_copy'); ?></p>
					<div class="footer-cta-form"><?php the_field('form_embed'); ?></div>
				</div>
			</div>
		</div>
	</section>

	<section id="page-footer" style="background-color:<?php echo $pageFooterBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-50 first">
				<div id="head-logo">
					<a href="/" class="custom-logo-link" rel="home" itemprop="url">
                        <img src="/wp-content/uploads/2019/09/header-img-2x.png" class="custom-logo" alt="Hecht, Kleeger &amp; Damashek, P.C." style="max-width:300px;">
					</a>
				</div>
				</div>
				<div class="column-50">
					<h3 style="color:<?php echo $pageFooterText; ?>"><?php the_field('page_footer_cta'); ?></h3>
					<p style="color:<?php echo $pageFooterText; ?>"><?php the_field('page_footer_disclaimer'); ?></p>
				</div>
			</div>
		</div>
	</section>

</div>

<?php get_footer(); ?>
