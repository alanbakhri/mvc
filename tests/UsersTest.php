<?php

class UsersTest extends \PHPUnit_framework_TestCase
{
    protected $user;

    public function setUp ()
    {
        $this->user = new \alanbakhri\mvc\Controllers\Users();
    }

    public function testSpeak ()
    {
        $this->assertSame('speaking', $this->user->speak());
    }
}
