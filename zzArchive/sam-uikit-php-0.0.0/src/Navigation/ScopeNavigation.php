<?php 

namespace SAMUIKit\Navigation;

class ScopeNavigation {

	/**
	 * Verify configuration.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function build($config)
	{
		$scopeName = $config['scopeName'];
		$homePath = $config['homePath'];
		$selectedPath = $config['selectedPath'];
		$links = ( isset($config['links']) ) ? $config['links'] : null;
		return ScopeNavigation::b($scopeName, $homePath, $selectedPath, $links);
	}

	/**
	 * Required keys
	 * * **scopeName:** The name of the scope - display as the first link in the menu.
	 * * **homePath:** The URL for the home page of the scope.
	 * * **selectedPath:** The URL to mark as selected.
	 *
	 * Optional keys
	 * * **links:** A key-value array where the "key" is the target of the link, and the "value" is the title for the link.
	 * 
	 * @param  [type] $scopeName    [description]
	 * @param  [type] $homePath     [description]
	 * @param  [type] $selectedPath [description]
	 * @param  [type] $links        [description]
	 * @return [type]               [description]
	 */
	static public function b($scopeName, $homePath, $selectedPath, $links = null) 
	{
		$string = '<nav class="iae-secondary-navigation" aria-label="Secondary navigation">';
		$string .= '<ul class="no-js">';

		// first linke
		$string .= '<li class="iae-click-nav">';
		if ( $homePath == $selectedPath ) {
			$string .= '<a href="'. $homePath .'" class="selected">'. $scopeName .'</a>';

		} else {
			$string .= '<a href="'. $homePath .'">'. $scopeName .'</a>';

		}
		$string .= '</li>';

		if ( !is_null($links) ) {
			foreach ($links as $path => $title) {
				if ( $path == $selectedPath ) {
					$string .= '<li><a href="'. $path .'" class="selected">'. $title .'</a></li>';

				} else {
					$string .= '<li><a href="'. $path .'">'. $title .'</a></li>';					

				}
			}
		}
    
    	$string .= '</ul>';
    	$string .= '</nav>';
    	return $string;
	}
}