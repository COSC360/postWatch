<?php

use PHPUnit\Framework\TestCase;

class CreateUserTest extends TestCase
{
    private $mysqli;

    public function setUp(): void
    {
        $this->mysqli = require __DIR__ . '/../database.php';
    }

    public function testUserCanBeCreated()
    {
        $password = "test_password";
        $username = "test_username";
        $email = "test_email@example.com";

        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, email, password_hashed) VALUES (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);

        $this->assertTrue($stmt !== false, "Failed to prepare statement");

        $stmt->bind_param("sss", $username, $email, $password_hashed);

        $result = $stmt->execute();

        $this->assertTrue($result !== false, "Failed to execute statement");

        $this->assertEquals(1, $stmt->affected_rows, "No rows were affected by the query");

        $stmt->close();
    }

    public function tearDown(): void
    {
        $this->mysqli->query("DELETE FROM user WHERE username = 'test_username'");
        $this->mysqli->close();
    }
}
