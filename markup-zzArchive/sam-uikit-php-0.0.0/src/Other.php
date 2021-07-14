<?php

namespace SAMUIKit;

use SAMUIKit\Other\Button;
use SAMUIKit\Other\Label;
use SAMUIKit\Other\Accordion;
use SAMUIKit\Other\Action;
use SAMUIKit\Other\Alert;
use SAMUIKit\Other\Resource;
use SAMUIKit\Other\Icon;

class Other {
	
	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * Required keys
	 * * **title:** The text in bold at the beginning of the alert.
	 * * **message:** The text under the alert heading.
	 *
	 * Optional keys
	 * * **type:** error|warning|success|info (default is info).
	 * * **dismissPath:** When set, a form with method POST and action target of value will be created. Note: you will want to process the POST request as the view will not.
	 * * **csrfField:** To support Cross-Site Request Forgery (CSRF), you may pass a token to be applied within the dismiss alert form.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function alert($config)
	{
		return Alert::build($config);
	}

	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * Required keys
	 * * **title:** The text to display within the button.
	 *
	 * Optional keys
	 * * **type:** alt|secondary|gray|outline|outline-inverse|big|disabled (default is the standard USWDS primary button).
	 * * **cancel:** Anchor href target for the cancel link. Usually not necessary.
	 * 
	 * @param  [type] $config Array of key-value pairs.
	 * @return [type]        [description]
	 */
	static public function button($config)
	{
		return Button::build($config);
	}

	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * Required keys
	 * * **title:** The text to display within the label.
	 *
	 * Optional keys
	 * * **big:** true|false Whether to use the "big" label from USWDS or not (default is false).
	 * * **moreClass:** Extra classes to add to the label span.
	 * * **background:** Class name for background color.
	 * * **icon:** Approved font-awesome icon to include. See Icon.
	 * * **surround:** HTML string, separated by a vertical bar to wrap the label span in.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]        [description]
	 */
	static public function label($config)
	{
		return Label::build($config);
	}

	/**
	 * **Accordion**
	 *
	 * Required keys
	 * * **title:** A non-HTML string used for the accordion button title.
	 * * **content:** An HTML string representing the body text of the accordion.
	 *
	 * Optional keys
	 * * **bordered:** true|false (default is false).
	 * * **expanded:** true|false (default is false) Whether to display the accordion as expanded or collapsed initially.
	 * 
	 * @param  [type]  $items    [description]
	 * @param  boolean $bordered [description]
	 * @param  boolean $expanded [description]
	 * @return [type]            [description]
	 */
	static public function accordion($config)
	{
		return Accordion::build($config);
	}

	static public function multipleAccordions($accordionConfigurations)
	{
		return Accordion::buildMany($accordionConfigurations);
	}

	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * Required keys
	 * * **type:** See Icon.
	 * * **target:** Anchor href target for the cancel link.
	 *
	 * Create type required keys
	 * * **createTitle:** Required if type is "create".
	 * 
	 * @param  [type] $config Array of key-value pairs.
	 * @return [type]        [description]
	 */
	static public function action($config)
	{
		return Action::build($config);
	}

	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * **Required keys**
	 * * **content:** An array of HTML strings to display in the content area of the search result.
	 *
	 * **Optional keys**
	 * * **metadata:** Array of HTML strings, or components to display in the meta data area of the resource.
	 * * **actions:** An array of Action configurations. See Action.
	 * 
	 * **Metadata expanded**
	 * If a component is passed the following applies.
	 *
	 * ***Required keys***
	 * * **template:** UIKit builder class name|function name. ex. "Other|label", is equivalent to IAE\Other::label()
	 * * **config:** The configuration of the component. See the component details for required and optional keys.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]        [description]
	 */
	static public function resource($config)
	{
		return Resource::build($config);
	}

	static public function icon($type)
	{
		return Icon::build($type);
	}
}