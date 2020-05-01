<?php

require_once('vendor/autoload.php');
require_once('index.php');

/**
 * TODO test書いてないよ
 * プロダクトを作りきったあとにテストの概念知って、書こうと思ったけど、
 * Rubyしたすぎて仕方がなかったからやめた。
 * */ 

class Test extends PHPUnit\Framework\TestCase {
    protected $sample;

    protected function setUp(): void {
        $this->sample = new Sample\Sample();
    }

    // test cording from here..
}