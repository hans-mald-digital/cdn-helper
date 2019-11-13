<?php

namespace CdnHelper\Tests\Unit;

use CdnHelper\Url;
use Orchestra\Testbench\TestCase;

class CdnHelperFunctionTest extends TestCase
{

    /**
     * @var string
     */
    protected $cdnUrl = 'https://cdn.test.io';

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('cdn_helper.url', $this->cdnUrl);
    }

    /** @test */
    public function returns_image_without_resizing()
    {
        $this->assertSame(
            'https://cdn.test.io/yoda.jpeg',
            (new Url('yoda.jpeg'))->__toString()
        );
    }

    /** @test */
    public function test_helper_function()
    {
        $this->assertSame(
            'https://cdn.test.io/yoda.jpeg',
            cdn('yoda.jpeg')
        );
    }

    /** @test */
    public function returns_url_with_dimensions()
    {
        $this->assertSame(
            'https://cdn.test.io/size:h200,mode:crop/yoda.jpeg',
            cdn('yoda.jpeg', 'h200')
        );
    }

    /** @test */
    public function returns_url_with_dimensions_and_mode()
    {
        $this->assertSame(
            'https://cdn.test.io/size:h200,mode:crop/yoda.jpeg',
            cdn('yoda.jpeg', 'h200', 'crop')
        );
    }

    /** @test */
    public function returns_correct_url_when_url_is_in_path()
    {
        $this->assertSame(
            'https://cdn.test.io/size:h200,mode:crop/yoda.jpeg',
            cdn('https://cdn.test.io/yoda.jpeg', 'h200', 'crop')
        );
    }
}
