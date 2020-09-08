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
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 *
 * @link        http://teknoo.software/di-symfony-bridge Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 */

declare(strict_types=1);

namespace Teknoo\Tests\DI\SymfonyBridge\FunctionalTest;

use Teknoo\Tests\DI\SymfonyBridge\FunctionalTest\Fixtures\Class1;
use Teknoo\Tests\DI\SymfonyBridge\FunctionalTest\Fixtures\Class2;

/**
 * Tests interactions between containers, i.e. entries that reference other entries in
 * other containers.
 *
 * @coversNothing
 */
class ContainerInteractionTest extends AbstractFunctionalTest
{
    public function testPhpdiShouldGetEntriesFromSymfonyToConstructAndSymfonyGetInPHPDI()
    {
        //Class 2 is defined in Symfony
        //Class 1 is defined in PHP DI
        //Class 1 requires Class 2
        //So PHPDI requires an entry from Symfony
        //And Symfony Container must use PHPDI to get Class1
        $kernel = $this->createKernel('class2.yml');

        $class1 = $kernel->getContainer()->get(Class1::class);

        self::assertInstanceOf(Class1::class, $class1);
    }

    public function testPhpdiAliasesCanReferenceSymfonyEntries()
    {
        $kernel = $this->createKernel('class2.yml');
        $container = $kernel->getContainer();

        $class2 = $container->get('class2Alias');

        self::assertInstanceOf(Class2::class, $class2);
    }
}
