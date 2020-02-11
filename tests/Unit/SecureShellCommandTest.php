<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Secure Shell.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\SecureShell\Tests\Unit;

use KodeKeep\SecureShell\SecureCopyShell;
use KodeKeep\SecureShell\SecureShell;
use KodeKeep\SecureShell\SecureShellCommand;
use KodeKeep\SecureShell\Tests\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

/**
 * @covers \KodeKeep\SecureShell\SecureShellCommand
 */
class SecureShellCommandTest extends TestCase
{
    use MatchesSnapshots;

    /** @test */
    public function can_create_a_command_for_a_script(): void
    {
        $shell = new SecureShell('user', '127.0.0.1');
        $shell->usePrivateKey('/home/root/.ssh/id_rsa');

        $this->assertMatchesSnapshot(SecureShellCommand::forScript($shell));
    }

    /** @test */
    public function can_create_a_command_for_an_upload(): void
    {
        $shell = new SecureCopyShell('user', '127.0.0.1');
        $shell->usePrivateKey('/home/root/.ssh/id_rsa');
        $shell->copy('/home/root/source', '/home/root/target');

        $this->assertMatchesSnapshot(SecureShellCommand::forUpload($shell));
    }
}
