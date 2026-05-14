# Acme SDK

A lightweight PHP SDK that demonstrates clean library design with typed APIs, static analysis, testing, and CI quality gates.

## Requirements

- PHP 7.3+ (including 8.x)
- Composer

## Installation

```bash
composer require acme/acme-sdk
```

## Usage

```php
<?php

declare(strict_types=1);

use Acme\Sdk\MathClient;

$client = new MathClient();
$math = $client->math();

$sum = $math->add(2.0, 3.0);
$difference = $math->subtract(8.0, 2.0);
$product = $math->multiply(3.0, 4.0);
$quotient = $math->divide(10.0, 2.0);

echo $sum->getResult(); // 5

echo json_encode($sum, JSON_PRETTY_PRINT);
/*
{
    "result": 5,
    "operation": "addition",
    "operands": [2, 3]
}
*/
```

## Development

Run tests:

```bash
composer test
```

Run test coverage:

```bash
composer test:coverage
```

Run static analysis:

```bash
composer analyze
```

Run style checks:

```bash
composer lint
```

Fix style automatically:

```bash
composer lint:fix
```

Run backward compatibility check (Docker required):

```bash
composer bc-check
```

Run full local quality gate:

```bash
composer check
```

## License

This project is licensed under Apache License 2.0. See [LICENSE](LICENSE).
