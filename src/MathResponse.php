<?php

declare (strict_types = 1);

namespace Acme\Sdk;

use JsonSerializable;

/**
 * Immutable value object representing the result of a math operation.
 */
final class MathResponse implements JsonSerializable
{
    /**
     * @var float
     */
    private $result;

    /**
     * @var string
     */
    private $operation;

    /**
     * @var array<int, float>
     */
    private $operands;

    /**
     * @param array<int, float> $operands
     */
    public function __construct(float $result, string $operation, array $operands)
    {
        $this->result    = $result;
        $this->operation = $operation;
        $this->operands  = $operands;
    }

    /**
     * Get the operation result.
     */
    public function getResult(): float
    {
        return $this->result;
    }

    /**
     * Get a descriptive operation name.
     */
    public function getOperation(): string
    {
        return $this->operation;
    }

    /**
     * Get operation operands.
     *
     * @return array<int, float>
     */
    public function getOperands(): array
    {
        return $this->operands;
    }

    /**
     * @return array{result: float, operation: string, operands: array<int, float>}
     */
    public function jsonSerialize(): array
    {
        return [
            'result'    => $this->result,
            'operation' => $this->operation,
            'operands'  => $this->operands,
        ];
    }
}
