<?php

namespace Core\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    public function __construct(protected string $uuid)
    {
        $this->ensureIsValid($uuid);
    }

    public static function random(): self
    {
        $uuid = RamseyUuid::uuid4()->toString();

        return new self($uuid);
    }

    public function __toString(): string
    {
        return $this->uuid;
    }

    private function ensureIsValid(string $uuid)
    {
        if (!RamseyUuid::isValid($uuid)) {
            throw new InvalidArgumentException(sprintf('<%s> invalid uuid <%s>', static::class, $uuid));
        }
    }
}