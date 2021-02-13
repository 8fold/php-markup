<?php

namespace SAMUIKit\Other;

use SAMUIKit\Other;

class Label {

	const backgroundColorNames = [
			''          => '',
			'create'    => '',
			'edit'      => '',
			'delete'    => 'iae-label-error',
			'archive'   => '',
			'unarchive' => '',
			'info'      => 'iae-label-info',
			'success'   => 'iae-label-success',
			'warning'   => 'iae-label-warning',
			'error'     => 'iae-label-error'	
		];	

	static public function build($config)
	{
		// we need to modify the initial output
		// $base = '';

		// // clear the span
		// if ( isset($config['big']) && $config['big'] ) {
		// 	$base = str_replace('<span class="usa-label-big">', '', $initial);

		// } else {
		// 	$base = str_replace('<span class="usa-label">', '', $initial);

		// }

		// // none of the extended optional are set,
		// // return early.
		// if ( !isset($config['moreClass']) 
		// 	&& !isset($config['background']) 
		// 	&& !isset($config['icon']) 
		// 	&& !isset($config['surround']) ) {
		// 	return $base;
		// }

		// replace the span
		$span = '';
		if ( isset($config['big']) && $config['big'] ) {
			$span = '<span class="usa-label-big';

		} else {
			$span = '<span class="usa-label';

		}
		$span .= ( isset($config['moreClass']) && strlen($config['moreClass']) > 0 ) 
			? ' '. $config['moreClass'] 
			: '';
		$span .= ( isset($config['background']) && strlen($config['background']) > 0 ) 
			? ' '. Label::backgroundColorNames[$config['background']] 
			: '';

		// close the span
		$span .= '">';

		// handle icon
		$icon = '';
		if ( isset($config['icon']) ) {
			$icon .= Other::icon($config['icon']) .' ';

		}

		// handle surrounding element
		$surroundOpen = '';
		$surroundClose = '';
		if ( isset($config['surround']) ) {
			$parts = explode('|', $config['surround']);
			if ( count($parts) !== 2 ) {
				die("app-label not configured properly: surround can only contain two elements after separating on the vertical bar");

			}
			$surroundOpen = $parts[0];
			$surroundClose = $parts[1];			
		}

		return $surroundOpen . $span . $icon . $config['title'] .'</span>'. $surroundClose;
	}	
}