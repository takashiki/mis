<?php
namespace Mis\Container\Exception;

use RuntimeException;
use Interop\Container\Exception\ContainerException as ContainerExceptionInterface;

class ContainerException extends RuntimeException implements ContainerExceptionInterface
{

}