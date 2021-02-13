<?php

namespace SAMUIKit\Other;

use SAMUIKit\Other;

use SAMUIKit\Other\Button;

class Alert {

	static public function build($config)
	{
		$title = $config['title'];
		$message = $config['message'];
		$type = ( isset($config['type']) ) ? $config['type'] : null;
		$readMore = ( isset($config['readMore']) ) ? $config['readMore'] : null;
		$string = '';
		if ( is_null($type) || $type == 'info' ) {
			$string .= '<div class="usa-alert usa-alert-info">';

		} else {
			if ( $type == 'success' ) {
				$string .= '<div class="usa-alert usa-alert-success">';

			} elseif ( $type == 'warning' ) {
				$string .= '<div class="usa-alert usa-alert-warning">';

			} elseif ( $type == 'error' ) {
				$string .= '<div class="usa-alert usa-alert-error" role="alert">';

			}
		}
  		$string .= '<div class="usa-alert-body">';
  		$string .= '<h3 class="usa-alert-heading">'. $title .'</h3>';
    	$string .= '<p class="usa-alert-text">'. $message;
    	$string .= ( !is_null($readMore) ) ? '<br><a href="'. $readMore .'">Continue reading...</a>' : '';
    	$string .= '</p>';
  		$string .= '</div>';
		$string .= '</div>';

		// We would like to be able to dismiss the alert,
		// if user is authenticated and the dismissal can be tracked.
		if ( isset($config['dismissPath']) ) {
			$separator = '<div class="usa-alert-body">';
			$stringParts = explode($separator, $string);
			$stringParts[0] .= '<form method="POST" action="'. $config['dismissPath'] .'">';
			$stringParts[0] .= ( !is_null($config['csrfField']) ) ? $config['csrfField'] : '';
			$stringParts[0] .= Button::build([
					'title' => 'dismiss',
					'type' => 'dismiss'
				]);
			$stringParts[0] .= '</form>';
			$string = implode($separator, $stringParts);
		}

		return $string;
	}
}