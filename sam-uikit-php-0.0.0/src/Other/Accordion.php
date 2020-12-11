<?php

namespace SAMUIKit\Other;

class Accordion {

	static public function buildMany($accordionConfigurations)
	{
		$string = '';
		foreach ($accordionConfigurations as $config) {
			$string .= Accordion::build($config);
		}
		return $string;
	}

	static public function build($config)
	{
		$bordered = ( isset($config['bordered']) ) ? $config['bordered'] : false;

		$string = ( $bordered ) ? '<div class="usa-accordion-bordered">' : '<div class="usa-accordion">';
		$string .= '<ul class="usa-unstyled-list">';
		$string .= '<li>';
		
		// handle button
		if ( isset($config['expanded']) && $config['expanded'] ) {
			$string .= '<button class="usa-button-unstyled" aria-expanded="true" aria-controls="collapsible-0">';

		} else {
			$string .= '<button class="usa-button-unstyled" aria-expanded="false" aria-controls="collapsible-1">';

		}
		$string .= $config['title'];
		$string .= '</button>';

		// handle content
		if ( isset($config['expanded']) && $config['expanded'] ) {
			$string .= '<div id="collapsible-0" aria-hidden="false" class="usa-accordion-content">';

		} else {
			$string .= '<div id="collapsible-1" aria-hidden="true" class="usa-accordion-content">';

		}
		$string .= $config['content'];
		$string .= '</div>';

		$string .= '</li>';
		$string .= '</ul>';
		$string .= '</div>';

		return $string;		
	}
}