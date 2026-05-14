<?php

declare(strict_types=1);

namespace Acme\Sdk\Tests;

use Acme\Sdk\MathClient;
use Acme\Sdk\MathController;
use Acme\Sdk\MathResponse;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class MathControllerTest extends TestCase
{
    /**
     * @var MathController
     */
    private $controller;

    protected function setUp(): void
    {
        $client = new MathClient();
        $this->controller = $client->math();
    }

    public function testClientReturnsSameControllerInstance(): void
    {
        $client = new MathClient();

        self::assertSame($client->math(), $client->math());
    }

    public function testAddReturnsExpectedResponse(): void
    {
        $response = $this->controller->add(2.5, 3.5);

        self::assertInstanceOf(MathResponse::class, $response);
        self::assertSame(6.0, $response->getResult());
        self::assertSame('addition', $response->getOperation());
        self::assertSame([2.5, 3.5], $response->getOperands());
    }

    public function testSubtractReturnsExpectedResponse(): void
    {
        $response = $this->controller->subtract(10.0, 4.0);

        self::assertSame(6.0, $response->getResult());
        self::assertSame('subtraction', $response->getOperation());
        self::assertSame([10.0, 4.0], $response->getOperands());
    }

    public function testMultiplyReturnsExpectedResponse(): void
    {
        $response = $this->controller->multiply(-3.0, 2.0);

        self::assertSame(-6.0, $response->getResult());
        self::assertSame('multiplication', $response->getOperation());
        self::assertSame([-3.0, 2.0], $response->getOperands());
    }

    public function testDivideReturnsExpectedResponse(): void
    {
        $response = $this->controller->divide(8.0, 2.0);

        self::assertSame(4.0, $response->getResult());
        self::assertSame('division', $response->getOperation());
        self::assertSame([8.0, 2.0], $response->getOperands());
    }

    public function testDivideByZeroThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Division by zero is not allowed.');

        $this->controller->divide(10.0, 0.0);
    }

    public function testMathResponseCanBeJsonSerialized(): void
    {
        $response = $this->controller->add(1.0, 2.0);

        $json = json_encode($response);
        self::assertNotFalse($json);

        $decoded = json_decode($json, true);
        self::assertIsArray($decoded);
        self::assertSame('addition', $decoded['operation']);
        self::assertSame([1, 2], $decoded['operands']);
        self::assertEquals(3.0, $decoded['result']);
    }
}
