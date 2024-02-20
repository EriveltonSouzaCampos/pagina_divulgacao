<?php
/**
 * Copyright (C) 2014-2023 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Kangaroos cannot jump here' );
}
?>

<div class="ai1wm-reset-container">
	<div class="ai1wm-reset-content">
		<aside>
			<nav>
				<a href="#" class="active" data-tab="plugins">
					<i class="ai1wm-icon-power-cord"></i>
					<?php _e( 'Reset Plugins', AI1WM_PLUGIN_NAME ); ?>
				</a>
				<a href="#" data-tab="themes">
					<i class="ai1wm-icon-stack"></i>
					<?php _e( 'Reset Themes', AI1WM_PLUGIN_NAME ); ?>
				</a>
				<a href="#" data-tab="media-files">
					<i class="ai1wm-icon-image"></i>
					<?php _e( 'Reset Media Files', AI1WM_PLUGIN_NAME ); ?>
				</a>
				<a href="#" data-tab="reset-all">
					<i class="ai1wm-icon-arrow-down"></i>
					<?php _e( 'Reset All', AI1WM_PLUGIN_NAME ); ?>
				</a>
			</nav>
		</aside>
		<section>
			<article>
				<a href="#" class="active" data-tab="plugins">
					<i class="ai1wm-icon-power-cord"></i>
					<?php _e( 'Reset Plugins', AI1WM_PLUGIN_NAME ); ?>
					<span></span>
				</a>
				<div class="active" data-tab="plugins">
					<h2>
						<?php _e( 'Reset Plugins', AI1WM_PLUGIN_NAME ); ?> <a href="https://servmask.com/products/unlimited-extension?utm_campaign=reset&utm_source=wordpress&utm_medium=textlink" target="_blank"><?php _e( 'Enable this feature', AI1WM_PLUGIN_NAME ); ?></a>
					</h2>
					<img src="<?php echo wp_make_link_relative( AI1WM_URL ); ?>/lib/view/assets/img/reset/plugins.png?v=<?php echo AI1WM_VERSION; ?>" />
					<p><?php _e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', AI1WM_PLUGIN_NAME ); ?></p>
				</div>
			</article>
			<article>
				<a href="#" data-tab="themes">
					<i class="ai1wm-icon-stack"></i>
					<?php _e( 'Reset Themes', AI1WM_PLUGIN_NAME ); ?>
					<span></span>
				</a>
				<div data-tab="themes">
					<h2>
						<?php _e( 'Reset Themes', AI1WM_PLUGIN_NAME ); ?> <a href="https://servmask.com/products/unlimited-extension?utm_campaign=reset&utm_source=wordpress&utm_medium=textlink" target="_blank"><?php _e( 'Enable this feature', AI1WM_PLUGIN_NAME ); ?></a>
					</h2>
					<img src="<?php echo wp_make_link_relative( AI1WM_URL ); ?>/lib/view/assets/img/reset/themes.png?v=<?php echo AI1WM_VERSION; ?>" />
					<p><?php _e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', AI1WM_PLUGIN_NAME ); ?></p>
				</div>
			</article>
			<article>
				<a href="#" data-tab="media-files">
					<i class="ai1wm-icon-image"></i>
					<?php _e( 'Reset Media Files', AI1WM_PLUGIN_NAME ); ?>
					<span></span>
				</a>
				<div data-tab="media-files">
					<h2>
						<?php _e( 'Reset Media Files', AI1WM_PLUGIN_NAME ); ?> <a href="https://servmask.com/products/unlimited-extension?utm_campaign=reset&utm_source=wordpress&utm_medium=textlink" target="_blank"><?php _e( 'Enable this feature', AI1WM_PLUGIN_NAME ); ?></a>
					</h2>
					<img src="<?php echo wp_make_link_relative( AI1WM_URL ); ?>/lib/view/assets/img/reset/media-files.png?v=<?php echo AI1WM_VERSION; ?>" />
					<p><?php _e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', AI1WM_PLUGIN_NAME ); ?></p>
				</div>
			</article>
			<article>
				<a href="#" data-tab="reset-all">
					<i class="ai1wm-icon-arrow-down"></i>
					<?php _e( 'Reset All', AI1WM_PLUGIN_NAME ); ?>
					<span></span>
				</a>
				<div data-tab="reset-all">
					<h2>
						<?php _e( 'Reset All', AI1WM_PLUGIN_NAME ); ?> <a href="https://servmask.com/products/unlimited-extension?utm_campaign=reset&utm_source=wordpress&utm_medium=textlink" target="_blank"><?php _e( 'Enable this feature', AI1WM_PLUGIN_NAME ); ?></a>
					</h2>
					<img src="<?php echo wp_make_link_relative( AI1WM_URL ); ?>/lib/view/assets/img/reset/reset-all.png?v=<?php echo AI1WM_VERSION; ?>" />
					<p><?php _e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', AI1WM_PLUGIN_NAME ); ?></p>
				</div>
			</article>
		</section>
	</div>
</div>
