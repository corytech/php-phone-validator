<?php

declare(strict_types=1);

namespace Corytech\PhoneValidator\Constraint;

use libphonenumber\PhoneNumberUtil;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class PhoneValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof Phone) {
            throw new UnexpectedTypeException($value, Phone::class);
        }

        if ($value === null) {
            return;
        }
        $phoneUtil = PhoneNumberUtil::getInstance();
        if (!$phoneUtil->isPossibleNumber('+'.$value)) {
            $this->context
                ->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
