<?php

namespace SAMUIKit\Other;


class Resource {
	
	static public function build($config)
	{
		$content = $config['content'];
		$metadata = ( isset($config['metadata']) ) ? $config['metadata'] : [];
		$actions = ( isset($config['actions']) ) ? $config['actions'] : [];
				
		// handle content
		$contents = '<div class="usa-width-one-whole">';
		if ( count($metadata) > 0 || count($actions) > 0 ) {
			$contents = '<div class="usa-width-two-thirds">';

		}

		foreach ($content as $part) {
			$contents .= $part;

		}
		$contents .= '</div>';

		// handle metadata
		$metas = '';
		if ( count($metadata) > 0 || count($actions) > 0 ) {
			$metas .= '<div class="usa-width-one-third">';

		}
		
		foreach ($metadata as $meta) {
			if ( is_array($meta) ) {
				$template = $meta['template'];
				$templateParts = explode('|', $template);
				
				$class = $templateParts[0];
				$class = 'SAMUIKit\\'. $class;

				$functionName = $templateParts[1];
				
				$combined = $class .'::'. $functionName;
				
				$metas .= call_user_func($combined, $meta['config']);// $uiKitClass::buildFromArray($meta['config']); 

			} else {
				$metas .= $meta;

			}
		}

		if ( count($actions) > 0 ) {
			$metas .= '<div class="usa-width-one-whole">';

			foreach ($actions as $action => $config) {
				$metas .= Action::build($config);

			}
			$metas .= '</div>';
		}

		if ( count($metadata) > 0 || count($actions) > 0 ) {
			$metas .= '</div>';

		}

		return $contents . $metas;
	}
}