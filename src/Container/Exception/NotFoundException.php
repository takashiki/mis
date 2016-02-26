<?php

namespace Mis\Container\Exception;

use Interop\Container\Exception\NotFoundException as NotFoundExceptionInterface;
use RuntimeException;

class NotFoundException extends RuntimeException implements NotFoundExceptionInterface
{
}
