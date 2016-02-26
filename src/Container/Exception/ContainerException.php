<?php

namespace Mis\Container\Exception;

use Interop\Container\Exception\ContainerException as ContainerExceptionInterface;
use RuntimeException;

class ContainerException extends RuntimeException implements ContainerExceptionInterface
{
}
