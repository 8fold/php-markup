<?php

namespace SAMUIKit\Traits;

trait Iconic {

	public static function icons()
	{
		return [
			'create'    => 'fa-plus',
			'edit'      => 'fa-pencil-square',
			'delete'    => 'fa-trash',
			'archive'   => 'fa-archive',
			'unarchive' => 'fa-undo',
			'info'      => 'fa-info-circle',
			'success'   => 'fa-check-circle',
			'warning'   => 'fa-exclamation-triangle',
			'error'     => 'fa-exclamation-circle'
		];
	}

	public static function iconForType($type)
	{
		if ( array_key_exists($type, Iconic::icons()) ) {
			$iconArray = Iconic::icons();
			return $iconArray[$type];

		}
	}
}