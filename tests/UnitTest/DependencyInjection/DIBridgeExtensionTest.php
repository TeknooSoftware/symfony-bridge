<?php

/*
 * Symfony Bridge.
 *
 * LICENSE
 *
 * This source file is subject to the MIT license and the version 3 of the GPL3
 * license that are bundled with this package in the folder licences
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to richarddeloge@gmail.com so we can send you a copy immediately.
 *
 *
 * @copyright   Copyright (c) 2009-2020 Richard Déloge (richarddeloge@gmail.com)
 *
 * @link        http://teknoo.software/di-symfony-bridge Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 */

declare(strict_types=1);

namespace Teknoo\Tests\DI\SymfonyBridge\UnitTest\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Teknoo\DI\SymfonyBridge\DependencyInjection\DIBridgeExtension;

/**
 * @covers \Teknoo\DI\SymfonyBridge\DependencyInjection\DIBridgeExtension
 */
class DIBridgeExtensionTest extends TestCase
{
    public function buildInstance(): DIBridgeExtension
    {
        return new DIBridgeExtension();
    }
}
