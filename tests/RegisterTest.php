<?php

require_once Models\User.php;
use Models\User;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    private $User;

    protected function setUp(): void
    {
        $this->User = new User();
    }

    public function testValidRegistration(): void
    {
        $data = [
            "email" => "test@example.com",
            "username" => "testuser",
            "password" => "password"
        ];
        $result = $this->User->User($data);
        $this->assertIsInt($result);
    }

    public function testMissingEmail(): void
    {
        $data = [
            "username" => "testuser",
            "password" => "password"
        ];
        $this->expectException(Exception::class);
        $this->User->User($data);
    }

    public function testMissingUsername(): void
    {
        $data = [
            "email" => "test@example.com",
            "password" => "password"
        ];
        $this->expectException(Exception::class);
        $this->User->User($data);
    }

    public function testMissingPassword(): void
    {
        $data = [
            "email" => "test@example.com",
            "username" => "testuser"
        ];
        $this->expectException(Exception::class);
        $this->User->User($data);
    }
}
?>