<?php

/*
 * This file is part of the EmailChecker package.
 *
 * (c) Matthieu Moquet <matthieu@moquet.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EmailChecker\Tests\Adpater;

use EmailChecker\Adapter\FileAdapter;
use EmailChecker\Tests\TestCase;

class FileAdapterTest extends TestCase
{
    protected $adapter;

    public function setUp()
    {
        $this->adapter = new FileAdapter(__DIR__.'/../../../fixtures/throwaway_domains.txt');
    }

    /**
     * @dataProvider throwawayDomains
     */
    public function testThrowawayDomains($domain)
    {
        $this->assertTrue($this->adapter->isThrowawayDomain($domain));
    }

    /**
     * @dataProvider notThrowawayDomains
     */
    public function testNotThrowawayDomains($domain)
    {
        $this->assertFalse($this->adapter->isThrowawayDomain($domain));
    }

    public static function throwawayDomains()
    {
        return array(
            array('jetable.org'),
            array('mailjet.org'),
            array('dummy-space.ext'),
            array('yopmail.com'),
        );
    }

    public static function notThrowawayDomains()
    {
        return array(
            array('gmail.com'),
            array('hotmail.com'),
            array('comment.ext'),
        );
    }
}
