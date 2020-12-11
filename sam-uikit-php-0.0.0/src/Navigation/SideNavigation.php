<?php

namespace SAMUIKit\Navigation;

class SideNavigation {
	
	static public function build($config)
	{
		$pageUrl = $config['current'];
		$pageUrl_parts = explode('/', $pageUrl);
		$menu = $config['menu'];

		$string = '<aside>';
		$string .= '<nav>';
		$string .= '<ul class="usa-sidenav-list">';

		foreach ($menu as $parent) {
			$parentLink = strtolower($parent['path']);
			$string .= '<li>';
			$string .= ( strpos($parentLink, '#') !== false ) ? '<a href="'. $parentLink .'"' : '<a href="/'. $parentLink .'/"';
			$string .= ( isset($pageUrl_parts[1]) && $pageUrl_parts[1] == $parentLink ) ? ' class="usa-current"' : '';
			$string .= '>';
			$string .= $parent['title'];
			$string .= '</a>';

			// child menu
			if ( isset($parent['submenu']) ) {
				$string .= '<ul class="usa-sidenav-sub_list';
				// $string .= ( $pageUrl_parts[1] == $parentLink ) ? ' visual-style-sublist' : '';
				$string .= '">';

				foreach ($parent['submenu'] as $child) {
					$childLink = strtolower($child['path']);
					$string .= '<li>';
					$string .= '<a href="/'. $parentLink .'/'. $childLink .'"';
					$string .= ( !isset($pageUrl_parts[3]) && isset($pageUrl_parts[2]) && $pageUrl_parts[2] == $childLink ) ? ' class="usa-current"' : '';
					$string .= '>';
					$string .= $child['title'];
					$string .= '</a>';

					if ( isset($child['submenu']) ) {
						$string .= '<ul class="usa-sidenav-sub_list';
						// $string .= ( isset($pageUrl_parts[2]) && $pageUrl_parts[2] == $childLink ) ? ' display-block' : '';
						$string .= '">';
						foreach ($child['submenu'] as $grandchild) {
							$grandchildLink = strtolower($grandchild['path']);
							$string .= '<li>';
							$string .= '<a href="/'. $parentLink .'/'. $childLink .'/'. $grandchildLink .'"';
							$string .= ( isset($pageUrl_parts[3]) && $pageUrl_parts[3] == $grandchildLink ) ? ' class="usa-current"' : '';
							$string .= '>';
							$string .= $grandchild['title'];
							$string .= '</a>';
							$string .= '</li>';

						}
						$string .= '</ul>';
					}
					$string .= '</li>';
				}
				$string .= '</ul>';
			}
			$string .= '</li>';
		}
		$string .= '</ul>';
		$string .= '</nav>';
		$string .= '</aside>';

		return $string;
	}
}