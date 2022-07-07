<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'LINGVICO_THEME_FREE' ) ) {
	define( 'LINGVICO_THEME_FREE', false );
}
if ( ! defined( 'LINGVICO_THEME_FREE_WP' ) ) {
	define( 'LINGVICO_THEME_FREE_WP', false );
}

// If this theme uses multiple skins
if ( ! defined( 'LINGVICO_ALLOW_SKINS' ) ) {
	define( 'LINGVICO_ALLOW_SKINS', false );
}
if ( ! defined( 'LINGVICO_DEFAULT_SKIN' ) ) {
	define( 'LINGVICO_DEFAULT_SKIN', 'default' );
}

// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
$GLOBALS['LINGVICO_STORAGE'] = array(

	// Theme required plugin's slugs
	'required_plugins'   => array_merge(

		// List of plugins for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			// Required plugins
			// DON'T COMMENT OR REMOVE NEXT LINES!
			'trx_addons'         => esc_html__( 'ThemeREX Addons', 'lingvico' ),
			'trx_updater'         => esc_html__( 'ThemeREX Updater', 'lingvico' ),

			// If theme use OCDI instead (or both) ThemeREX Addons Installer
			

			// Recommended (supported) plugins for both (lite and full) versions
			// If plugin not need - comment (or remove) it
			'elementor'          => esc_html__( 'Elementor', 'lingvico' ),
			'contact-form-7'     => esc_html__( 'Contact Form 7', 'lingvico' ),
			'mailchimp-for-wp'   => esc_html__( 'MailChimp for WP', 'lingvico' ),
			// GDPR Support: uncomment only one of two following plugins
            'wp-gdpr-compliance' => esc_html__( 'Cookie Information', 'lingvico' ),
            'search-filter'      => esc_html__('Search & Filter', 'lingvico'),
            'learnpress'      => esc_html__('LearnPress', 'lingvico'),
		),
		// List of plugins for the FREE version only
		//-----------------------------------------------------
		LINGVICO_THEME_FREE
			? array(
				// Recommended (supported) plugins for the FREE (lite) version
				'siteorigin-panels' => esc_html__( 'SiteOrigin Panels', 'lingvico' ),
			)

		// List of plugins for the PREMIUM version only
		//-----------------------------------------------------
			: array(
				// Recommended (supported) plugins for the PRO (full) version
				// If plugin not need - comment (or remove) it

				'booked'                     => esc_html__( 'Booked Appointments', 'lingvico' ),
				'essential-grid'             => esc_html__( 'Essential Grid', 'lingvico' ),
                'strong-testimonials'        => esc_html__( 'Strong Testimonials', 'lingvico'),
                'revslider'          => esc_html__( 'Revolution Slider', 'lingvico' ),
			)
	),

	// Theme-specific blog layouts
	'blog_styles'        => array_merge(
		// Layouts for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			'excerpt' => array(
				'title'   => esc_html__( 'Standard', 'lingvico' ),
				'archive' => 'index-excerpt',
				'item'    => 'content-excerpt',
				'styles'  => 'excerpt',
			),
			'classic' => array(
				'title'   => esc_html__( 'Classic', 'lingvico' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'classic',
			),
		),
		// Layouts for the FREE version only
		//-----------------------------------------------------
		LINGVICO_THEME_FREE
		? array()

		// Layouts for the PREMIUM version only
		//-----------------------------------------------------
		: array(
			'masonry'   => array(
				'title'   => esc_html__( 'Masonry', 'lingvico' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'masonry',
			),
			'portfolio' => array(
				'title'   => esc_html__( 'Portfolio', 'lingvico' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio',
				'columns' => array( 2, 3, 4 ),
				'styles'  => 'portfolio',
			),
			'gallery'   => array(
				'title'   => esc_html__( 'Gallery', 'lingvico' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio-gallery',
				'columns' => array( 2, 3, 4 ),
				'styles'  => array( 'portfolio', 'gallery' ),
			),
			'chess'     => array(
				'title'   => esc_html__( 'Chess', 'lingvico' ),
				'archive' => 'index-chess',
				'item'    => 'content-chess',
				'columns' => array( 1, 2, 3 ),
				'styles'  => 'chess',
			),
		)
	),

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-themerex',

	// Generate Personal token from Envato to automatic upgrade theme
	'upgrade_token_url'  => 'https://build.envato.com/create-token/?default=t&purchase:download=t&purchase:list=t',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => 'http://lingvico.themerex.net',
	'theme_doc_url'      => 'http://lingvico.themerex.net/doc',

    'theme_rate_url'     => 'https://themeforest.net/download',

    'theme_download_url' => 'http://themeforest.net/user/themerex/portfolio',            // ThemeREX

    'theme_custom_url' => '//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themedash',                              // ThemeREX

    'theme_support_url'  => 'https://themerex.net/support/',                             // ThemeREX

    'theme_video_url'    => 'https://www.youtube.com/channel/UCnFisBimrK2aIE-hnY70kCA',  // ThemeREX

    'theme_privacy_url'  => 'https://themerex.net/privacy-policy/',                      // ThemeREX

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By device
		'wide'       => array(
			'min' => 2160
		),
		'desktop'    => array(
			'min' => 1680,
			'max' => 2159,
		),
		'notebook'   => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'     => array(
			'min' => 768,
			'max' => 1279,
		),
		'not_mobile' => array( 'min' => 768 ),
		'mobile'     => array( 'max' => 767 ),
		// By size
		'xxl'        => array( 'max' => 1679 ),
		'xl'         => array( 'max' => 1439 ),
		'lg'         => array( 'max' => 1279 ),
		'md_over'    => array( 'min' => 1024 ),
		'md'         => array( 'max' => 1023 ),
		'sm'         => array( 'max' => 767 ),
		'sm_wp'      => array( 'max' => 600 ),
		'xs'         => array( 'max' => 479 ),
	),
);

// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'lingvico_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'lingvico_customizer_theme_setup1', 1 );
	function lingvico_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		lingvico_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',            // none  - use separate options for the main and the child-theme
																// child - duplicate theme options from the main theme to the child-theme only
																// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',             // Refresh method for preview area in the Appearance - Customize:
																// auto - refresh preview area on change each field with Theme Options
																// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                  // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,               // Place 'comment' field after the 'name' and 'email'

				'show_author_avatar'     => true,               // Display author's avatar in the post meta

				'icons_selector'         => 'internal',         // Icons selector in the shortcodes:
																// vc (default) - standard VC (very slow) or Elementor's icons selector (not support images and svg)
																// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',            // Type of icons (if 'icons_selector' is 'internal'):
																// icons  - use font icons to present icons
																// images - use images from theme's folder trx_addons/css/icons.png
																// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',            // Type of socials icons (if 'icons_selector' is 'internal'):
																// icons  - use font icons to present social networks
																// images - use images from theme's folder trx_addons/css/icons.png
																// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,               // Check if exists a .min version of .css and .js and return path to it
																// instead the path to the original file
																// (if debug_mode is off and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,              // Show any menu if no menu selected in the location 'main_menu'
																// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,              // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,               // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,              // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,              // Allow use image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,               // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,              // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																// In the Page Options this styles are present always
																// (can be removed if filter 'lingvico_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,              // Add arrows on the single attachment page to navigate to the prev/next attachment
				
				'gutenberg_safe_mode'    => array(),            // 'vc', 'elementor' - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'allow_gutenberg_blocks' => true,               // Allow our shortcodes and widgets as blocks in the Gutenberg (not ready yet - in the development now)

				'subtitle_above_title'   => true,               // Put subtitle above the title in the shortcodes

				'add_hide_on_xxx'        => 'replace',          // Add our breakpoints to the Responsive section of each element
																// 'add' - add our breakpoints after Elementor's
																// 'replace' - add our breakpoints instead Elementor's
																// 'none' - don't add our breakpoints (using only Elementor's)
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		
		lingvico_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Muli',
					'family' => 'sans-serif',
					'styles' => '200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',     // Parameter 'style' used only for the Google fonts
				),
                array(
                    'name'   => 'Brawler',
                    'family' => 'serif',
                    'styles' => '400',
                ),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		lingvico_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
		
		
		

		lingvico_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'lingvico' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'lingvico' ),
					'font-family'     => '"Brawler",serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.53em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.5em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '5em',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '1.047em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1.9px',
					'margin-top'      => '1.3em',
					'margin-bottom'   => '0.85em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '3.824em',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1.5px',
					'margin-top'      => '1.3em',
					'margin-bottom'   => '0.95em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '2.941em',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '1.1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1.3px',
					'margin-top'      => '1.48em',
					'margin-bottom'   => '1.2em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '2.118em',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.9px',
					'margin-top'      => '1.6923em',
					'margin-bottom'   => '1.25em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '1.765em',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '1.2em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.7px',
					'margin-top'      => '1.85em',
					'margin-bottom'   => '1.12em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '1.412em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.6px',
					'margin-top'      => '1.76em',
					'margin-bottom'   => '1em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'lingvico' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '1.647em',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '-1.2px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '12px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '22px',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.9px',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'lingvico' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '1.05em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.5em', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-.9px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'lingvico' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '12px',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'lingvico' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '12px',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'lingvico' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'lingvico' ),
					'font-family'     => '"Muli",sans-serif',
					'font-size'       => '12px',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px',
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		lingvico_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'lingvico' ),
					'description' => esc_html__( 'Colors of the main content area', 'lingvico' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'lingvico' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'lingvico' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'lingvico' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'lingvico' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'lingvico' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'lingvico' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'lingvico' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'lingvico' ),
				),
			)
		);
		lingvico_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'lingvico' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'lingvico' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'lingvico' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'lingvico' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'lingvico' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'lingvico' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'lingvico' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'lingvico' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'lingvico' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'lingvico' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'lingvico' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'lingvico' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'lingvico' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'lingvico' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'lingvico' ),
					'description' => esc_html__( 'Color of the links inside this block', 'lingvico' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'lingvico' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'lingvico' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'lingvico' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'lingvico' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'lingvico' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'lingvico' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'lingvico' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'lingvico' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'lingvico' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'lingvico' ),
				),
			)
		);
		lingvico_storage_set(
			'schemes', array(

				// Color scheme: 'default'
				'default' => array(
					'title'    => esc_html__( 'Default', 'lingvico' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#ffffff', //+
						'bd_color'         => '#ededec', //+

						// Text and links colors
						'text'             => '#3f354d', //+
						'text_light'       => '#8a819a', //+
						'text_dark'        => '#301a52', //+
						'text_link'        => '#f24080', //+
						'text_hover'       => '#4a287c', //+
						'text_link2'       => '#41246d', //+
						'text_hover2'      => '#f24080', //+
						'text_link3'       => '#f24080', //+
						'text_hover3'      => '#ffffff', //+

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#ededec', //+
						'alter_bg_hover'   => '#eaeaea', //+
						'alter_bd_color'   => '#ffffff', //+
						'alter_bd_hover'   => '#aca3ba', //+
						'alter_text'       => '#3f354d', //+
						'alter_light'      => '#8a819a', //+
						'alter_dark'       => '#301a52', //+
						'alter_link'       => '#f24080', //+
						'alter_hover'      => '#4a287c', //+
						'alter_link2'      => '#ededec', //+
						'alter_hover2'     => '#ffffff', //+
						'alter_link3'      => '#41246d', //+
						'alter_hover3'     => '#ededec', //+

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#4a287c', //+
						'extra_bg_hover'   => '#2d2f37', //+
						'extra_bd_color'   => '#ffffff', //+
						'extra_bd_hover'   => '#f5b417', //+
						'extra_text'       => '#3f354d', //+
						'extra_light'      => '#8a819a', //+
						'extra_dark'       => '#ffffff', //+
						'extra_link'       => '#f5b417', //+
						'extra_hover'      => '#4a287c', //+
						'extra_link2'      => '#41246d', //+
						'extra_hover2'     => '#6131aa', //+
						'extra_link3'      => '#837697', //+
						'extra_hover3'     => '#f8f8f7', //+

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#ededec', //+
						'input_bg_hover'   => '#ffffff', //+
						'input_bd_color'   => '#ededec', //+
						'input_bd_hover'   => '#f5b417', //+
						'input_text'       => '#3f354d', //+
						'input_light'      => '#504462', //+
						'input_dark'       => '#301a52', //+

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#301a52', //+
						'inverse_bd_hover' => '#3f354d', //+
						'inverse_text'     => '#ffffff', //+
						'inverse_light'    => '#8a819a', //+
						'inverse_dark'     => '#ffffff', //+
						'inverse_link'     => '#ffffff', //+
						'inverse_hover'    => '#4a287c', //+
					),
				),

				// Color scheme: 'dark'
				'dark'    => array(
					'title'    => esc_html__( 'Dark', 'lingvico' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#3d2167', //+
						'bd_color'         => '#301a52', //+

						// Text and links colors
						'text'             => '#b0b2b5', //+
						'text_light'       => '#dddbe0', //+
						'text_dark'        => '#ffffff', //+
						'text_link'        => '#f24080', //+
						'text_hover'       => '#f5b417', //+
						'text_link2'       => '#41246d', //+
						'text_hover2'      => '#f5b417', //+
						'text_link3'       => '#f5b417', //+
						'text_hover3'      => '#41246d', //+

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#4a287c', //+
						'alter_bg_hover'   => '#311a54', //+
						'alter_bd_color'   => '#301a52', //+
						'alter_bd_hover'   => '#271544', //+
						'alter_text'       => '#dddbe0', //+
						'alter_light'      => '#dddbe0', //+
						'alter_dark'       => '#ffffff', //+
						'alter_link'       => '#f24080', //+
						'alter_hover'      => '#f5b417', //+
						'alter_link2'      => '#ededec', //+
						'alter_hover2'     => '#6131aa', //+
						'alter_link3'      => '#ffffff', //+
						'alter_hover3'     => '#6131aa', //+

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#f24080', //+
						'extra_bg_hover'   => '#311a54', //+
						'extra_bd_color'   => '#301a52', //+
						'extra_bd_hover'   => '#301a52', //+
						'extra_text'       => '#dddbe0', //+
						'extra_light'      => '#dddbe0', //+
						'extra_dark'       => '#ffffff', //+
						'extra_link'       => '#f5b417', //+
						'extra_hover'      => '#fe7259',
						'extra_link2'      => '#f24080', //+
						'extra_hover2'     => '#ffffff', //+
						'extra_link3'      => '#837697', //+
						'extra_hover3'     => '#f8f8f7', //+

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#ffffff', //+
						'input_bg_hover'   => '#ffffff', //+
						'input_bd_color'   => '#ffffff', //+
						'input_bd_hover'   => '#ffffff', //+
						'input_text'       => '#ffffff', //+
						'input_light'      => '#504462', //+
						'input_dark'       => '#504462', //+

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#301a52', //+
						'inverse_bd_hover' => '#3f354d', //+
						'inverse_text'     => '#ffffff', //+
						'inverse_light'    => '#8a819a', //+
						'inverse_dark'     => '#ffffff', //+
						'inverse_link'     => '#ffffff', //+
						'inverse_hover'    => '#f5b417', //+
					),
				),

			)
		);

        lingvico_storage_set( 'schemes_original', lingvico_storage_get( 'schemes' ) );

		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		lingvico_storage_set(
			'schemes_simple', array(
				'text_link'        => array(
					'alter_hover'      => 1,
					'extra_link'       => 1,
					'inverse_bd_color' => 0.85,
					'inverse_bd_hover' => 0.7,
				),
				'text_hover'       => array(
					'alter_link'  => 1,
					'extra_hover' => 1,
				),
				'text_link2'       => array(
					'alter_hover2' => 1,
					'extra_link2'  => 1,
				),
				'text_hover2'      => array(
					'alter_link2'  => 1,
					'extra_hover2' => 1,
				),
				'text_link3'       => array(
					'alter_hover3' => 1,
					'extra_link3'  => 1,
				),
				'text_hover3'      => array(
					'alter_link3'  => 1,
					'extra_hover3' => 1,
				),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
				'inverse_bd_color' => array(),
				'inverse_bd_hover' => array(),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		lingvico_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Parameters to set order of schemes in the css
		lingvico_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		lingvico_storage_set(
			'theme_thumbs', apply_filters(
				'lingvico_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'lingvico-thumb-huge'        => array(
						'size'  => array( 1170, 658, true ),
						'title' => esc_html__( 'Huge image', 'lingvico' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'lingvico-thumb-big'         => array(
						'size'  => array( 760, 428, true ),
						'title' => esc_html__( 'Large image', 'lingvico' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'lingvico-thumb-med'         => array(
						'size'  => array( 370, 208, true ),
						'title' => esc_html__( 'Medium image', 'lingvico' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Small square image (for avatars in comments, etc.)
					'lingvico-thumb-tiny'        => array(
						'size'  => array( 90, 90, true ),
						'title' => esc_html__( 'Small square avatar', 'lingvico' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'lingvico-thumb-masonry-big' => array(
						'size'  => array( 760, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'lingvico' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'lingvico-thumb-masonry'     => array(
						'size'  => array( 370, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'lingvico' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
                    // Small square image (for avatars in popular post, etc.)
                    'lingvico-thumb-small'        => array(
                        'size'  => array( 112, 112, true ),
                        'title' => esc_html__( 'Small square avatar', 'lingvico' ),
                        'subst' => 'trx_addons-thumb-small',
                    ),
                    'lingvico-thumb-audio'        => array(
                        'size'  => array( 148, 148, true ),
                        'title' => esc_html__( 'Small square audio avatar', 'lingvico' ),
                        'subst' => 'trx_addons-thumb-audio',
                    ),
                    'lingvico-thumb-excerpt'        => array(
                        'size'  => array( 805, 400, true ),
                        'title' => esc_html__( 'Excerpt image', 'lingvico' ),
                        'subst' => 'trx_addons-thumb-excerpt',
                    ),
                    'lingvico-thumb-team'        => array(
                        'size'  => array( 406, 474, true ),
                        'title' => esc_html__( 'Team image', 'lingvico' ),
                        'subst' => 'trx_addons-thumb-team',
                    ),
                    'lingvico-thumb-single'        => array(
                        'size'  => array( 406, 600, true ),
                        'title' => esc_html__( 'Team single image', 'lingvico' ),
                        'subst' => 'trx_addons-thumb-single',
                    ),
                    'lingvico-thumb-learnpress'        => array(
                        'size'  => array( 342, 254, true ),
                        'title' => esc_html__( 'LP image', 'lingvico' ),
                        'subst' => 'trx_addons-thumb-learnpress',
                    ),
                    'lingvico-thumb-video'        => array(
                        'size'  => array( 600, 355, true ),
                        'title' => esc_html__( 'Video blogger image', 'lingvico' ),
                        'subst' => 'trx_addons-thumb-video',
                    ),
				)
			)
		);
	}
}


//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'lingvico_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'lingvico_importer_set_options', 9 );
	function lingvico_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url( 'http://demofiles.themerex.net/lingvico/' );
			// Required plugins
			$options['required_plugins'] = array_keys( lingvico_storage_get( 'required_plugins' ) );
			// Set number of thumbnails (usually 3 - 5) to regenerate at once when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 0;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'Lingvico Demo', 'lingvico' );
			$options['files']['default']['domain_dev']  = esc_url( 'http://lingvico.themerex.net' );       // Developers domain
			$options['files']['default']['domain_demo'] =  esc_url( 'https://lingvico.themerex.net' );         // Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter
			
			
			
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'lingvico_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'lingvico_ocdi_set_options', 9 );
	function lingvico_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( lingvico_get_protocol() . '://demofiles.themerex.net/lingvico/' );
			// Required plugins
			$options['required_plugins'] = array_keys( lingvico_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'Lingvico OCDI Demo', 'lingvico' );
			$options['files']['ocdi']['domain_demo'] = esc_url( lingvico_get_protocol() . '://lingvico.themerex.net' );
			// If theme need more demo - just copy 'default' and change required parameter
			
			
			
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'lingvico_create_theme_options' ) ) {

	function lingvico_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = __( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'lingvico' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( lingvico_storage_get( 'schemes' ) ) < 2;

		lingvico_storage_set(
			'options', array(

				// 'Logo & Site Identity'
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'lingvico' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'lingvico' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'lingvico' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'lingvico' ) ),
					'class'    => 'lingvico_column-1_2 lingvico_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'lingvico' ),
					'type'     => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'lingvico' ) ),
					'class'    => 'lingvico_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'lingvico' ),
					'desc'    => wp_kses_post(
									__( 'Zoom the logo (set 1 to leave original size).', 'lingvico' )
									. ' <br>'
									. __( 'Attention! For this parameter to affect images, their max-height should be specified in "em" instead of "px" when creating a header.', 'lingvico' )
									. ' <br>'
									. __( 'In this case maximum size of logo depends on the actual size of the picture.', 'lingvico' )
								),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'lingvico' ) ),
					'class'      => 'lingvico_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'lingvico' ) ),
					'class' => 'lingvico_column-1_2 lingvico_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'lingvico' ) ),
					'class'      => 'lingvico_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'lingvico' ) ),
					'class' => 'lingvico_column-1_2 lingvico_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'lingvico' ) ),
					'class'      => 'lingvico_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'image',
				),

				// 'General settings'
				'general'                       => array(
					'title'    => esc_html__( 'General Settings', 'lingvico' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'lingvico' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'lingvico' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'qsetup'   => esc_html__( 'General', 'lingvico' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => lingvico_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'lingvico' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1280,
					'min'        => 1000,
					'max'        => 1400,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',         // SASS variable's name to preview changes 'on fly'
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'lingvico' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'lingvico' ),
					
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Widgets', 'lingvico' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'lingvico' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_position_mobile'       => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices - above or below the content', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_mobile_single'
						'section' => esc_html__( 'Widgets', 'lingvico' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'below',
					'qsetup'   => esc_html__( 'General', 'lingvico' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_widgets_single'
						'section' => esc_html__( 'Widgets', 'lingvico' ),
					),
					'dependency' => array(
						'sidebar_position' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'lingvico' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'lingvico' ) ),
					'std'        => 407,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'lingvico' ) ),
					'std'        => 70,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'lingvico' ) ),
					'refresh' => false,
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'lingvico' ),
					),
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'lingvico' ) ),
					'std'        => 0,
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'lingvico' ),
					'desc'  => '',
					'type'  => LINGVICO_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'lingvico' ) ),
					'std'   => 0,
					'type'  => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'lingvico'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'lingvico') ),
					"std"   => wp_kses_post( __( 'I agree that my submitted data is being collected and stored.', 'lingvico') ),
					"type"  => "text"
				),

				// 'Header'
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'lingvico' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'std'      => 'default',
					'options'  => lingvico_get_list_header_footer_types(),
					'type'     => LINGVICO_THEME_FREE || ! lingvico_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'lingvico' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => LINGVICO_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight'             => array(
					'title'    => esc_html__( 'Header fullheight', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'std'      => 0,
					'type'     => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_zoom'                   => array(
					'title'   => esc_html__( 'Header zoom', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Zoom the header title. 1 - original size', 'lingvico' ) ),
					'std'     => 1,
					'min'     => 0.3,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'slider',
				),

				'header_columns'                => array(
					'title'      => esc_html__( 'Header columns', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'dependency' => array(
						'header_type'    => array( 'default' ),
						'header_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => lingvico_get_list_range( 0, 6 ),
					'type'       => 'select',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'lingvico' ) ),
					'type'  => LINGVICO_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'lingvico' ),
					),
					'type'     => LINGVICO_THEME_FREE || ! lingvico_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'lingvico' ) ),
					'std'   => 1,
					'type'  => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_image_info'             => array(
					'title' => esc_html__( 'Header image', 'lingvico' ),
					'desc'  => '',
					'type'  => LINGVICO_THEME_FREE ? 'hidden' : 'info',
				),
				'header_image_override'         => array(
					'title'    => esc_html__( 'Header image override', 'lingvico' ),
					'desc'     => wp_kses_data( __( "Allow override the header image with the page's/post's/product's/etc. featured image", 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'std'      => 0,
					'type'     => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'lingvico' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'lingvico' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'lingvico' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'lingvico' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'lingvico' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'lingvico' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'lingvico' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'lingvico' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				// 'Footer'
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'lingvico' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'lingvico' ),
					),
					'std'      => 'default',
					'options'  => lingvico_get_list_header_footer_types(),
					'type'     => LINGVICO_THEME_FREE || ! lingvico_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'lingvico' ),
					'desc'       => wp_kses_post( __( 'Select custom footer from Layouts Builder', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'lingvico' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => LINGVICO_THEME_FREE ? 'footer-custom-elementor-footer-default' : 'footer-custom-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'lingvico' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'lingvico' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => lingvico_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'lingvico' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'lingvico' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'lingvico' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'lingvico' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'lingvico' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! lingvico_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'lingvico' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by ThemeREX. All rights reserved.', 'lingvico' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),

				// 'Blog'
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'lingvico' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),

				// Blog - Posts page
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'lingvico' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'lingvico' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'lingvico' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'lingvico' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'lingvico' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'lingvico' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'lingvico' ),
						'fullpost' => esc_html__( 'Full post', 'lingvico' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'lingvico' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 22,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'lingvico' ) ),
					'std'     => 2,
					'options' => lingvico_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'lingvico' ),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'lingvico' ),
						'links'    => esc_html__( 'Older/Newest', 'lingvico' ),
						'more'     => esc_html__( 'Load more', 'lingvico' ),
						'infinite' => esc_html__( 'Infinite scroll', 'lingvico' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Animation for the posts', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'none',
					'options'    => array(),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_header_info'              => array(
					'title' => esc_html__( 'Header', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_blog'              => array(
					'title'    => esc_html__( 'Header style', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'lingvico' ) ),
					'std'      => 'inherit',
					'options'  => lingvico_get_list_header_footer_types( true ),
					'type'     => LINGVICO_THEME_FREE || ! lingvico_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_blog'             => array(
					'title'      => esc_html__( 'Select custom layout', 'lingvico' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'lingvico' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'custom' ),
					),
					'std'        => LINGVICO_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_blog'          => array(
					'title'    => esc_html__( 'Header position', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'lingvico' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_blog'        => array(
					'title'    => esc_html__( 'Header fullheight', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'lingvico' ) ),
					'std'      => 0,
					'type'     => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_wide_blog'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'lingvico' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'lingvico' ) ),
					'std'     => 'inherit',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'lingvico' ),
					'type'    => 'switch',
				),
				'sidebar_position_mobile_blog'  => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices - above or below the content', 'lingvico' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'qsetup'   => esc_html__( 'General', 'lingvico' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'lingvico' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'lingvico' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'lingvico' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'blog_widgets_info'             => array(
					'title' => esc_html__( 'Additional widgets', 'lingvico' ),
					'desc'  => '',
					'type'  => LINGVICO_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the top of the page', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'lingvico' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_above_content_blog'    => array(
					'title'   => esc_html__( 'Widgets above the content', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'lingvico' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_content_blog'    => array(
					'title'   => esc_html__( 'Widgets below the content', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'lingvico' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the bottom of the page', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'lingvico' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),

				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Select or upload an image used as placeholder for posts without a featured image', 'lingvico' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'lingvico' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'lingvico' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'lingvico' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'lingvico' ),
						'columns' => esc_html__( 'Mini-cards', 'lingvico' ),
					),
					'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'lingvico' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'lingvico' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|counters=1|author=0|share=0|edit=0',
					'options'    => lingvico_get_list_meta_parts(),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters'                      => array(
					'title'      => esc_html__( 'Post counters', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if ThemeREX Addons is active', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=1|likes=0|comments=1',
					'options'    => lingvico_get_list_counters(),
					'type'       => LINGVICO_THEME_FREE || ! lingvico_exists_trx_addons() ? 'hidden' : 'checklist',
				),

				// Blog - Single posts
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'lingvico' ) ),
					'type'  => 'section',
				),

				'blog_single_header_info'       => array(
					'title' => esc_html__( 'Header', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_post'              => array(
					'title'    => esc_html__( 'Header style', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'lingvico' ) ),
					'std'      => 'inherit',
					'options'  => lingvico_get_list_header_footer_types( true ),
					'type'     => LINGVICO_THEME_FREE || ! lingvico_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_post'             => array(
					'title'      => esc_html__( 'Select custom layout', 'lingvico' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'lingvico' ) ),
					'dependency' => array(
						'header_type_post' => array( 'custom' ),
					),
					'std'        => LINGVICO_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_post'          => array(
					'title'    => esc_html__( 'Header position', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'lingvico' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_post'        => array(
					'title'    => esc_html__( 'Header fullheight', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'lingvico' ) ),
					'std'      => 0,
					'type'     => 'hidden',
				),
				'header_wide_post'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'lingvico' ) ),
					'dependency' => array(
						'header_type_post' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_single_sidebar_info'      => array(
					'title' => esc_html__( 'Sidebar', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_single'       => array(
					'title'   => esc_html__( 'Sidebar position', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar on the single posts', 'lingvico' ) ),
					'std'     => 'right',
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'lingvico' ),
					),
					'options' => array(),
					'type'    => 'switch',
				),
				'sidebar_position_mobile_single'=> array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on the single posts on mobile devices - above or below the content', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'lingvico' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_single'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on the single posts', 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'lingvico' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_post'           => array(
					'title'   => esc_html__( 'Expand content', 'lingvico' ),
					'desc'    => wp_kses_data( __( 'Expand the content width on the single posts if the sidebar is hidden', 'lingvico' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'blog_single_title_info'      => array(
					'title' => esc_html__( 'Featured image and title', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'lingvico' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'post_thumbnail_type'      => array(
					'title'      => esc_html__( 'Type of post thumbnail', 'lingvico' ),
					'desc'       => wp_kses_data( __( "Select type of post thumbnail on the single post's pages", 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'default',
					'options'    => array(
						'fullwidth'   => esc_html__( 'Fullwidth', 'lingvico' ),
						'boxed'       => esc_html__( 'Boxed', 'lingvico' ),
						'default'     => esc_html__( 'Default', 'lingvico' ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_position'          => array(
					'title'      => esc_html__( 'Post header position', 'lingvico' ),
					'desc'       => wp_kses_data( __( "Select post header position on the single post's pages", 'lingvico' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'under',
					'options'    => array(
						'above'      => esc_html__( 'Above the post thumbnail', 'lingvico' ),
						'under'      => esc_html__( 'Under the post thumbnail', 'lingvico' ),
						'on_thumb'   => esc_html__( 'On the post thumbnail', 'lingvico' ),
						'default'    => esc_html__( 'Default', 'lingvico' ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_align'             => array(
					'title'      => esc_html__( 'Align of the post header', 'lingvico' ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'dependency' => array(
						'post_header_position' => array( 'on_thumb' ),
					),
					'std'        => 'mc',
					'options'    => array(
						'ts' => esc_html__('Top Stick Out', 'lingvico'),
						'tl' => esc_html__('Top Left', 'lingvico'),
						'tc' => esc_html__('Top Center', 'lingvico'),
						'tr' => esc_html__('Top Right', 'lingvico'),
						'ml' => esc_html__('Middle Left', 'lingvico'),
						'mc' => esc_html__('Middle Center', 'lingvico'),
						'mr' => esc_html__('Middle Right', 'lingvico'),
						'bl' => esc_html__('Bottom Left', 'lingvico'),
						'bc' => esc_html__('Bottom Center', 'lingvico'),
						'br' => esc_html__('Bottom Right', 'lingvico'),
						'bs' => esc_html__('Bottom Stick Out', 'lingvico'),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'post_subtitle'                 => array(
					'title' => esc_html__( 'Post subtitle', 'lingvico' ),
					'desc'  => wp_kses_data( __( "Specify post subtitle to display it under the post title.", 'lingvico' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'std'   => '',
					'hidden' => true,
					'type'  => 'text',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'lingvico' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'lingvico' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_post'               => array(
					'title'      => esc_html__( 'Post meta', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'lingvico' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'lingvico' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|counters=1|author=0|share=0|edit=0',
					'options'    => lingvico_get_list_meta_parts(),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters_post'                 => array(
					'title'      => esc_html__( 'Post counters', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if plugin ThemeREX Addons is active', 'lingvico' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=1|likes=0|comments=1',
					'options'    => lingvico_get_list_counters(),
					'type'       => LINGVICO_THEME_FREE || ! lingvico_exists_trx_addons() ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'lingvico' ) ),
					'std'   => 1,
					'type'  => ! lingvico_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'lingvico' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'lingvico' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),

				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'lingvico' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'lingvico' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'lingvico' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => lingvico_get_list_range( 1, 9 ),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page (from 2 to 4)?', 'lingvico' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => lingvico_get_list_range( 1, 4 ),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'lingvico' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => lingvico_get_list_styles( 1, 2 ),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'lingvico' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'lingvico' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'lingvico'),
						'side'    => esc_html__('Side', 'lingvico'),
						'outside' => esc_html__('Outside', 'lingvico'),
						'top'     => esc_html__('Top', 'lingvico'),
						'bottom'  => esc_html__('Bottom', 'lingvico')
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'lingvico' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'lingvico'),
						'bottom'  => esc_html__('Bottom', 'lingvico')
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'lingvico' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'text',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'lingvico' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'lingvico' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'below_content' => esc_html__( 'After content', 'lingvico' ),
						'below_page'    => esc_html__( 'After content & sidebar', 'lingvico' ),
					),
					'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
				),
				'posts_navigation_info'      => array(
					'title' => esc_html__( 'Posts navigation', 'lingvico' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_posts_navigation'		=> array(
					'title'    => esc_html__( 'Show posts navigation', 'lingvico' ),
					'desc'     => wp_kses_data( __( "Show posts navigation on the single post's pages", 'lingvico' ) ),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'fixed_posts_navigation'		=> array(
					'title'    => esc_html__( 'Fixed posts navigation', 'lingvico' ),
					'desc'     => wp_kses_data( __( "Make posts navigation fixed position. Display it when the content of the article is inside the window.", 'lingvico' ) ),
					'dependency' => array(
						'show_posts_navigation' => array( 1 ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),

				// 'Colors'
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'lingvico' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'lingvico' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'lingvico' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'lingvico' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'lingvico' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'lingvico' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'lingvico' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'menu_scheme'                   => array(
					'title'    => esc_html__( 'Sidemenu Color Scheme', 'lingvico' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'lingvico' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => 'hidden',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'lingvico' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'lingvico' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'lingvico' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'lingvico' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'lingvico' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'lingvico' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'lingvico' ),
					'desc'        => '',
					'std'         => '$lingvico_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);

		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'lingvico' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'lingvico' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'lingvico' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'lingvico' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'lingvico' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'lingvico' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'lingvico' ) ),
				'class'   => 'lingvico_column-1_3 lingvico_new_row',
				'refresh' => false,
				'std'     => '$lingvico_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= lingvico_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( lingvico_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'lingvico' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'lingvico' ),
				'desc'    => '',
				'class'   => 'lingvico_column-1_3 lingvico_new_row',
				'refresh' => false,
				'std'     => '$lingvico_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'lingvico' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'lingvico' ) )
							: '',
				'class'   => 'lingvico_column-1_3',
				'refresh' => false,
				'std'     => '$lingvico_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'lingvico' ),
					'serif'      => esc_html__( 'serif', 'lingvico' ),
					'sans-serif' => esc_html__( 'sans-serif', 'lingvico' ),
					'monospace'  => esc_html__( 'monospace', 'lingvico' ),
					'cursive'    => esc_html__( 'cursive', 'lingvico' ),
					'fantasy'    => esc_html__( 'fantasy', 'lingvico' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'lingvico' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'lingvico' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'lingvico' ) )
							: '',
				'class'   => 'lingvico_column-1_3',
				'refresh' => false,
				'std'     => '$lingvico_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = lingvico_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'lingvico' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses_post( sprintf( __( 'Font settings of the "%s" tag.', 'lingvico' ), $tag ) ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'lingvico' ),
						'100'     => esc_html__( '100 (Light)', 'lingvico' ),
						'200'     => esc_html__( '200 (Light)', 'lingvico' ),
						'300'     => esc_html__( '300 (Thin)', 'lingvico' ),
						'400'     => esc_html__( '400 (Normal)', 'lingvico' ),
						'500'     => esc_html__( '500 (Semibold)', 'lingvico' ),
						'600'     => esc_html__( '600 (Semibold)', 'lingvico' ),
						'700'     => esc_html__( '700 (Bold)', 'lingvico' ),
						'800'     => esc_html__( '800 (Black)', 'lingvico' ),
						'900'     => esc_html__( '900 (Black)', 'lingvico' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'lingvico' ),
						'normal'  => esc_html__( 'Normal', 'lingvico' ),
						'italic'  => esc_html__( 'Italic', 'lingvico' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'lingvico' ),
						'none'         => esc_html__( 'None', 'lingvico' ),
						'underline'    => esc_html__( 'Underline', 'lingvico' ),
						'overline'     => esc_html__( 'Overline', 'lingvico' ),
						'line-through' => esc_html__( 'Line-through', 'lingvico' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'lingvico' ),
						'none'       => esc_html__( 'None', 'lingvico' ),
						'uppercase'  => esc_html__( 'Uppercase', 'lingvico' ),
						'lowercase'  => esc_html__( 'Lowercase', 'lingvico' ),
						'capitalize' => esc_html__( 'Capitalize', 'lingvico' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'lingvico_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$lingvico_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		lingvico_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			lingvico_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'lingvico' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'lingvico' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is not 'Customize'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ! lingvico_check_current_url( 'customize.php' ) ) {
			lingvico_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'lingvico' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'lingvico' ) ),
					'class'    => 'lingvico_column-1_2 lingvico_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'lingvico' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'lingvico_options_get_list_cpt_options' ) ) {
	function lingvico_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"content_info_{$cpt}"           => array(
				'title' => esc_html__( 'Content', 'lingvico' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"body_style_{$cpt}"             => array(
				'title'    => esc_html__( 'Body style', 'lingvico' ),
				'desc'     => wp_kses_data( __( 'Select width of the body content', 'lingvico' ) ),
				'std'      => 'inherit',
				'options'  => lingvico_get_list_body_styles( true ),
				'type'     => 'select',
			),
			"boxed_bg_image_{$cpt}"         => array(
				'title'      => esc_html__( 'Boxed bg image', 'lingvico' ),
				'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'lingvico' ) ),
				'dependency' => array(
					"body_style_{$cpt}" => array( 'boxed' ),
				),
				'std'        => 'inherit',
				'type'       => 'image',
			),
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'lingvico' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'lingvico' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'lingvico' ) ),
				'std'     => 'inherit',
				'options' => lingvico_get_list_header_footer_types( true ),
				'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'lingvico' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'lingvico' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'lingvico' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'lingvico' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'lingvico' ),
				'desc'    => wp_kses_data( __( "Allow override the header image with the post's featured image", 'lingvico' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'lingvico' ),
					1         => esc_html__( 'Yes', 'lingvico' ),
					0         => esc_html__( 'No', 'lingvico' ),
				),
				'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_widgets_{$cpt}"         => array(
				'title'   => esc_html__( 'Header widgets', 'lingvico' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select set of widgets to show in the header on the %s pages', 'lingvico' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'select',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'lingvico' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the %s list', 'lingvico' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the %s list', 'lingvico' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_mobile_{$cpt}"=> array(
				'title'    => sprintf( __( 'Sidebar position on the %s list on mobile', 'lingvico' ), $title ),
				'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices - above or below the content', 'lingvico' ) ),
				'std'      => 'below',
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => sprintf( __( 'Sidebar widgets on the %s list', 'lingvico' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s list', 'lingvico' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"sidebar_position_single_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the single post', 'lingvico' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the single posts of the %s', 'lingvico' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_mobile_single_{$cpt}"=> array(
				'title'    => esc_html__( 'Sidebar position on the single post on mobile', 'lingvico' ),
				'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices - above or below the content', 'lingvico' ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'      => 'below',
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_single_{$cpt}"        => array(
				'title'      => wp_kses_data( sprintf( __( 'Sidebar widgets on the single post', 'lingvico' ), $title )),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select widgets to show in the sidebar on the single posts of the %s', 'lingvico' ), $title ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"expand_content_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content', 'lingvico' ),
				'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'lingvico' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'lingvico' ),
					1         => esc_html__( 'Expand', 'lingvico' ),
					0         => esc_html__( 'No', 'lingvico' ),
				),
				'type'    => 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'lingvico' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'lingvico' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'lingvico' ) ),
				'std'     => 'inherit',
				'options' => lingvico_get_list_header_footer_types( true ),
				'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'lingvico' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'lingvico' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => LINGVICO_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'lingvico' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'lingvico' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'lingvico' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'lingvico' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => lingvico_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'lingvico' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'lingvico' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),

			"widgets_info_{$cpt}"           => array(
				'title' => esc_html__( 'Additional panels', 'lingvico' ),
				'desc'  => '',
				'type'  => LINGVICO_THEME_FREE ? 'hidden' : 'info',
			),
			"widgets_above_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the top of the page', 'lingvico' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'lingvico' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_above_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets above the content', 'lingvico' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'lingvico' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets below the content', 'lingvico' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'lingvico' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the bottom of the page', 'lingvico' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'lingvico' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => LINGVICO_THEME_FREE ? 'hidden' : 'select',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'lingvico_options_get_list_choises' ) ) {
	add_filter( 'lingvico_filter_options_get_list_choises', 'lingvico_options_get_list_choises', 10, 2 );
	function lingvico_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = lingvico_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = lingvico_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = lingvico_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = lingvico_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = lingvico_get_list_sidebars( 'sidebar_widgets_single' != $id && ( strpos( $id, 'sidebar_widgets_' ) === 0 || strpos( $id, 'sidebar_widgets_single_' ) === 0 ), true );
			} elseif ( strpos( $id, 'sidebar_position_mobile' ) === 0 ) {
				$list = lingvico_get_list_sidebars_positions_mobile( strpos( $id, 'sidebar_position_mobile_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = lingvico_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = lingvico_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = lingvico_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = lingvico_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = lingvico_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = lingvico_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = lingvico_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = lingvico_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = lingvico_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = lingvico_array_merge( array( 0 => esc_html__( '- Select category -', 'lingvico' ) ), lingvico_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = lingvico_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = lingvico_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = lingvico_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}
