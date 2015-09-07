<?php
namespace Mis\Container\Exception;

use RuntimeException;
use Interop\Container\Exception\NotFoundException as NotFoundExceptionInterface;

class NotFoundException extends RuntimeException implements NotFoundExceptionInterface
{

}