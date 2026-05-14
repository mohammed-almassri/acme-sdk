<?php

declare(strict_types=1);

namespace Acme\Sdk;

/**
 * SDK entry point exposing controllers.
 */
final class MathClient
{
    /**
     * @var MathController|null
     */
    private $mathController;

    /**
     * Get the math operations controller.
     */
    public function math(): MathController
    {
        if ($this->mathController === null) {
            $this->mathController = new MathController();
        }

        return $this->mathController;
    }
}
