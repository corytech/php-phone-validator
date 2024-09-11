<?php

declare(strict_types=1);

namespace Corytech\PhoneValidator\Constraint;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class Phone extends Constraint
{
    public string $message = 'Invalid phone number';
}
