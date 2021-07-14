<?php

namespace Eightfold\Markup\Tests\Html;

use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
  protected function assertEquality($expected, $result)
  {
    $this->assertTrue($result == $expected, $expected ."\n\n". $result);
  }

  protected function assertPerformance($startMicrotime, $stopMicrotime, $milliseconds)
  {
    $tDiff = $stopMicrotime - $startMicrotime;
    $mSeconds = floor($tDiff * 1000);
    $this->assertTrue($mSeconds <= $milliseconds, $mSeconds .' is longer than '. $milliseconds);
  }

  protected function assertElementReturn($element = null, $config, $expected, $milliseconds)
  {
      $base = '\Eightfold\Html\Html';

      $result = '';
      if ( is_null($element) && count($config) > 0 ) {
        foreach ($config as $c) {
          $elem = $c['element'];
          $elemConfig = $c['config'];
          $tStart = microtime(true);
          $result .= $base::$elem($elemConfig);
          $tStop = microtime(true);
          $this->assertPerformance($tStart, $tStop, $milliseconds);
        }

      } else {
        $tStart = microtime(true);
        $result = $base::$element($config);
        $tStop = microtime(true);
        $this->assertPerformance($tStart, $tStop, $milliseconds);

      }
      $this->assertEquality($expected, $result);
  }
}
