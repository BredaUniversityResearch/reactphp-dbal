<?php

/*
 * This file is part of the DriftPHP Project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

declare(strict_types=1);

namespace Drift\DBAL\Mock;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Driver\API\ExceptionConverter;
use Doctrine\DBAL\Driver\Connection as DriverConnection;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\ServerVersionProvider;
use Exception;

if ((new \ReflectionMethod(Driver::class, 'getDatabasePlatform'))->getNumberOfParameters() === 1) {
    final class MockedDriver implements Driver
    {
        private AbstractPlatform $platform;

        public function __construct(AbstractPlatform $platform)
        {
            $this->platform = $platform;
        }

        public function connect(array $params): DriverConnection
        {
            throw new Exception('Mocked method. Unable to be used');
        }

        public function getDatabasePlatform(ServerVersionProvider $versionProvider): AbstractPlatform
        {
            return $this->platform;
        }

        public function getExceptionConverter(): ExceptionConverter
        {
            throw new Exception('Mocked method. Unable to be used');
        }
    }
} else {
    final class MockedDriver implements Driver
    {
        private AbstractPlatform $platform;

        public function __construct(AbstractPlatform $platform)
        {
            $this->platform = $platform;
        }

        public function connect(array $params, $username = null, $password = null, array $driverOptions = []): DriverConnection
        {
            throw new Exception('Mocked method. Unable to be used');
        }

        public function getDatabasePlatform(): AbstractPlatform
        {
            return $this->platform;
        }

        public function getSchemaManager(Connection $conn, AbstractPlatform $platform): AbstractSchemaManager
        {
            throw new Exception('Mocked method. Unable to be used');
        }

        public function getName()
        {
            throw new Exception('Mocked method. Unable to be used');
        }

        public function getDatabase(Connection $conn)
        {
            throw new Exception('Mocked method. Unable to be used');
        }

        public function getExceptionConverter(): ExceptionConverter
        {
            throw new Exception('Mocked method. Unable to be used');
        }
    }
}
