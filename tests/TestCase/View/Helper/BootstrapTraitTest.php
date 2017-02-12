<?php

namespace Bootstrap\Test\TestCase\View\Helper;

use Bootstrap\View\Helper\BootstrapTrait;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class PublicBootstrapTrait {

    use BootstrapTrait;

    public function __construct($view) {
    }

};

class BootstrapTraitTest extends TestCase {

    /**
     * Instance of PublicBootstrapTrait.
     *
     * @var PublicBootstrapTrait
     */
    public $trait;

    /**
     * Setup
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $view = new View();
        $this->trait = new PublicBootstrapTrait($view);
    }

    public function testAddClass() {
        // Test with a string
        $opts = [
            'class' => 'class-1'
        ];
        $opts = $this->trait->addClass($opts, '  class-1    class-2  ');
        $this->assertEquals($opts, [
            'class' => 'class-1 class-2'
        ]);
        // Test with an array
        $opts = $this->trait->addClass($opts, ['class-1', 'class-3']);
        $this->assertEquals($opts, [
            'class' => 'class-1 class-2 class-3'
        ]);
    }

};