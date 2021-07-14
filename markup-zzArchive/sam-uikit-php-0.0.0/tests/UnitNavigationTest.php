<?php

namespace SAMUIKit\tests;

use SAMUIKit\Navigation;

class UnitNavigationTest extends \PHPUnit_Framework_TestCase
{
	private $baseExpected =
  		'<aside>'.
  			'<nav>'.
  				'<ul class="usa-sidenav-list">'.
  					'<li>'.
  						'<a href="/current/" class="usa-current">Current page</a>'.
  					'</li>'.
  					'<li>'.
  						'<a href="#parent1">Parent link</a>'.
  					'</li>'.
  					'<li>'.
  						'<a href="#parent2">Parent link</a>'.
					'</li>'.
				'</ul>'.
			'</nav>'.
		'</aside>';	

	private $childExpected =
		'<aside>'.
			'<nav>'.
				'<ul class="usa-sidenav-list">'.
					'<li>'.
						'<a href="#">Parent link</a>'.
					'</li>'.
					'<li>'.
						'<a href="/current/" class="usa-current">Current page</a>'.
						'<ul class="usa-sidenav-sub_list">'.
							'<li>'.
								'<a href="/current/#">Child link</a>'.
							'</li>'.
							'<li>'.
								'<a href="/current/#">Child link</a>'.
							'</li>'.
							'<li>'.
								'<a href="/current/#">Child link</a>'.
							'</li>'.
							'<li>'.
								'<a href="/current/#">Child link</a>'.
							'</li>'.
							'<li>'.
								'<a href="/current/child" class="usa-current">Child Link</a>'.
							'</li>'.
						'</ul>'.
					'</li>'.
					'<li>'.
						'<a href="#">Parent link</a>'.
					'</li>'.
				'</ul>'.
			'</nav>'.
		'</aside>';

	private $grandchildExpected = 
    	'<aside>'.
    		'<nav>'.
    			'<ul class="usa-sidenav-list">'.
    				'<li>'.
    					'<a href="#">Parent link</a>'.
					'</li>'.
					'<li>'.
						'<a href="/current/" class="usa-current">Current page</a>'.
						'<ul class="usa-sidenav-sub_list">'.
							'<li>'.
								'<a href="/current/#">Child link</a>'.
							'</li>'.
							'<li>'.
								'<a href="/current/child">Child link</a>'.
								'<ul class="usa-sidenav-sub_list">'.
									'<li>'.
										'<a href="/current/child/#">Grandchild link</a>'.
									'</li>'.
									'<li>'.
                  						'<a href="/current/child/#">Grandchild link</a>'.
                  					'</li>'.
                  					'<li>'.
                  						'<a href="/current/child/grandchild" class="usa-current">Grandchild link</a>'.
                  					'</li>'.
                  				'</ul>'.
                  			'</li>'.
                  			'<li>'.
                  				'<a href="/current/#">Child link</a>'.
                  			'</li>'.
                  			'<li>'.
                  				'<a href="/current/#">Child link</a>'.
                  			'</li>'.
                  			'<li>'.
                  				'<a href="/current/#">Child link</a>'.
                  			'</li>'.
              			'</ul>'.
              		'</li>'.
              		'<li>'.
          				'<a href="#">Parent link</a>'.
          			'</li>'.
          		'</ul>'.
          	'</nav>'.
		'</aside>';


	private function assertEquality($expected, $result)
	{
		$this->assertTrue($result == $expected, $expected ."\n\n". $result);
	}

	public function testUSWDSSidenavOne()
	{
		$result = Navigation::sideNavigation([
			'menu' => [
				[
					'title' => 'Current page',
					'path'  => 'current'
				],
				[
					'title' => 'Parent link',
					'path' => '#parent1'
				],
				[
					'title' => 'Parent link',
					'path' => '#parent2'
				]
			],
			'current' => '/current/'
		]);
		$this->assertEquality($this->baseExpected, $result);
	}

	public function testUSWDSSidenavTwo()
	{
		// believe this failure is false - allow to fail.
		$result = Navigation::sideNavigation([
			'menu' => [
				[
					'title' => 'Parent link',
					'path'  => '#'
				],
				[
					'title' => 'Current page',
					'path' => 'current',
					'submenu' => [
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => 'child'
						]												
					]
				],
				[
					'title' => 'Parent link',
					'path' => '#'
				]
			],
			'current' => '/current/child'
		]);
		$this->assertEquality($this->childExpected, $result);
	}

	public function testUSWDSSidenavThree()
	{
		// believe this failure is false - allow to fail.
		$result = Navigation::sideNavigation([
			'menu' => [
				[
					'title' => 'Parent link',
					'path'  => '#'
				],
				[
					'title' => 'Current page',
					'path' => 'current',
					'submenu' => [
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => 'child',
							'submenu' => [
								[
									'title' => 'Grandchild link',
									'path' => '#',
								],
								[
									'title' => 'Grandchild link',
									'path' => '#',
								],
								[
									'title' => 'Grandchild link',
									'path' => 'grandchild',
								]
							]
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						]												
					]
				],
				[
					'title' => 'Parent link',
					'path' => '#'
				]
			],
			'current' => '/current/child/grandchild'
		]);
		$this->assertEquality($this->grandchildExpected, $result);
	}	
}