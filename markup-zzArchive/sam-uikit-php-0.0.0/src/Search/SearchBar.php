<?php

namespace SAMUIKit\Search;

use SAMUIKit\Other;
use SAMUIKit\FormControls;

class SearchBar {
	
	static public function build($config)
	{
		$label = $config['label'];
		$type = $config['type'];
		$action = $config['action'];
		$method = ( isset($config['method']) ) ? strtoupper($config['method']) : 'GET';
		$keywords = ( isset($config['keywords']) ) ? implode(' ', $config['keywords']) : null;
		$string = '';

		// open form
		if ( $type == 'big' ) {
			$string .= '<form class="usa-search usa-search-big"';
				
		} elseif ( $type == 'small' ) {
			$string .= '<form class="usa-search usa-search-small"';

		} else {
			$string .= '<form class="usa-search"';

		}
		$string .= 'action="'. $action .'" method="'. $method .'">';

		$string .= '<div role="search">';

		// label form
		if ( $type == 'big' ) {
			$string .= '<label class="usa-sr-only" for="search-field-big">';

		} elseif ( $type == 'medium' ) {
			$string .= '<label class="usa-sr-only" for="search-field">';
				
		} elseif ( $type == 'small' ) {
			$string .= '<label class="usa-sr-only" for="search-field-small">';

		}
		$string .= $label .'</label>';

		// search input text box
		if ( $type == 'big' ) {
			$string .= '<input id="search-field-big" type="search" name="search"';

		} elseif( $type == 'medium' ) {
			$string .= '<input id="search-field" type="search" name="search"';

		} elseif ( $type == 'small' ) {
			$string .= '<input id="search-field-small" type="search" name="search"';

		}
		$string .= ( strlen($keywords) > 0 ) ? ' value="'. $keywords .'">' : '>';

		// search button
		$string .= '<button type="submit">';
		if ( $type == 'big' || $type == 'medium' ) {
			$string .= '<span class="usa-search-submit-text">Search</span>';

		} elseif ( $type == 'small' ) {
			$string .= '<span class="usa-sr-only">Search</span>';
		}
		$string .= '</button>';
		$string .= '</div>';
		$string .= '</form>';

		if ( isset($config['filters']) ) {
			// We need to remove the closure from the USWDS search bar
			// in order to include our filters.
			$string = str_replace('</div></form>', '', $string);			
			
			foreach ($config['filters'] as $filter) {
				if ( $filter['type'] == 'checkbox') {
					$string .= '<div class="use-with-one-whole">';

				} else {
					$string .= '<div class="usa-width-one-half" style="margin-right: 7px;">';

				}
				$string .= FormControls::select($filter);
				$string .= '</div>';

			}

			// replace closure
			$string .= '</div></form>';			
		}		

		return $string;
	}
}