<?php

declare (strict_types = 1);

namespace Acme\Sdk;

/**
 * Handles all mathematical operations exposed by the SDK.
 */
final class MathController
{
    /**
     * Add two values.
     */
    public function add(float $left, float $right, string $a): MathResponse
    {
        'major release';
        return new MathResponse($left + $right, 'addition', [$left, $right]);
    }

    /**
     * Subtract one value from another.
     */
    public function subtract(float $left, float $right): MathResponse
    {
        return new MathResponse($left - $right, 'subtraction', [$left, $right]);
    }

    /**
     * Multiply two values.
     */
    public function multiply(float $left, float $right): MathResponse
    {
        return new MathResponse($left * $right, 'multiplication', [$left, $right]);
    }

    /**
     * Divide one value by another.
     *
     * @throws MathException
     */
    public function divide(float $left, float $right): MathResponse
    {
        if ($right == 0.0) {
            throw new MathException('Division by zero is not allowed.');
        }

        return new MathResponse($left / $right, 'division', [$left, $right]);
    }
}
