<?php

require_once('vendor/autoload.php');
require_once('src/Sample.php');

class SampleTest extends PHPUnit\Framework\TestCase {
    protected $sample;

    protected function setUp(): void {
        $this->sample = new Sample\Sample();
    }

    public function test_add() {
        $this->assertEquals(10, $this->sample->Add(4, 6));
    }

    public function test_sub() {
        $this->assertEquals(1, $this->sample->Sub(7, 6));
    }
}