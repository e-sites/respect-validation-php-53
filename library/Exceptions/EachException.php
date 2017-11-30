<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Respect\Validation\Exceptions;

class EachException extends NestedValidationException
{
    public static $defaultTemplates = array(
        self::MODE_DEFAULT => array(
            self::STANDARD => 'Each item in {{name}} must be valid',
        ),
        self::MODE_NEGATIVE => array(
            self::STANDARD => 'Each item in {{name}} must not validate',
        ),
    );
}
