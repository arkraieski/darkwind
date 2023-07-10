<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body 

<?php body_class( 'bg-white dark:bg-gray-900 text-gray-900 dark:text-white antialiased' ); ?>>

<?php do_action( 'darkwind_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'darkwind_header' ); ?>

	<header class = "sticky top-0 backdrop-blur w-full z-40 shadow-md overscroll-none">

		<div class="mx-auto container">
			<div class="lg:flex lg:justify-between lg:items-center border-b py-6">
				<div class="flex justify-between items-center">
					<div>
						<?php if ( has_custom_logo() ) { ?>
                            <?php the_custom_logo(); ?>
						<?php } else { ?>
							<a href="<?php echo esc_url( home_url() ); ?>" class="font-extrabold text-lg uppercase">
								<?php echo get_bloginfo( 'name' ); ?>
							</a>

							<p class="text-sm font-light dark:font-medium text-gray-600 dark:text-gray-200">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>

						<?php } ?>
					</div>

					<div class="lg:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
									<g id="icon-shape">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
											  id="Combined-Shape"></path>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>

				<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu',
						'container_class' => 'hidden bg-gray-100 dark:bg-gray-900 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
						'menu_class'      => 'lg:flex lg:-mx-4',
						'theme_location'  => 'primary', 
						'li_class_0'        => 'lg:mx-4, flex lg:relative group px-6 hover:text-primary',
						'submenu_class'   => 'lg:hidden group-hover:block lg:group-hover:top-6  lg:group-hover: lg:group-hover:place-content-center lg:absolute lg:right-0 lg:rounded lg:w-48 lg:max-w-xl text-primary dark:text-white bg-blue-50 dark:lg:bg-stone-600 dark:bg-gray-900 p-4 block',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
		</div>
	</header>

	<?php wp_body_open(); ?>

	<div id="content" class="site-content flex-grow">

		<?php if ( is_front_page() ) { ?>
			<!-- Start introduction -->
			<div class="container mx-auto">
				<div class="px-12 py-16 my-12 rounded-xl bg-gradient-to-r from-blue-50 dark:from-stone-600 dark:to-stone-800 from-10% via-sky-100 via-30% to-blue-200 to-90%">
                    <div class="mx-auto max-w-screen-md">
                        <h1 class="text-3xl lg:text-6xl tracking-tight font-extrabold text-gray-800 mb-6 dark:text-white dark:font-bold">Make sure <a href="https://tailwindcss.com" class="text-secondary">everyone</a> sees your message with
                             <a href="https://tailpress.io" class="text-primary">Darkwind</a>.</h1>
                        <p class="text-gray-600 text-xl font-medium mb-10 dark:text-gray-300">TailPress is your go-to starting
                            point for developing WordPress themes with Tailwind CSS and comes with basic block-editor support out
                            of the box.</p>
                        <a href="https://github.com/jeffreyvr/tailpress"
                            class="w-full sm:w-auto flex-none bg-primary text-white hover:bg-orange-500 text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200">View
                            on GitHub</a>
                    </div>
                </div>
			</div>
			<!-- End introduction -->
		<?php } ?>

		<?php do_action( 'darkwind_content_start' ); ?>

		<main class = "mt-28">
