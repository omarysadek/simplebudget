<?php

use PHPUnit\Framework\TestCase;

class PSRTwoTest extends TestCase
{
    protected $commands = [
        'php-cs-fixer.phar',
        'php-cs-fixer',
        'vendor/bin/php-cs-fixer',
    ];
    protected $command = null;

    public function setUp()
    {
        foreach ($this->commands as $command) {
            $this->command = trim(shell_exec("which $command"));
            if ($this->command) {
                return;
            }
        }
    }

    public function testPSR2()
    {
        if (!$this->command) {
            $this->markTestSkipped(
                'Needs linter to check PSR-2 compliance'
            );
        }

        foreach (array('src/', 'tests/') as $path) {
            exec(
                "$this->command fix --rules=@Symfony --dry-run ".$_SERVER['PWD']."/$path",
                $output,
                $returnVar
            );

            if ($output) {
                array_pop($output);
                $output = array_map('trim', $output);
            }

            $this->assertEquals(
                0,
                $returnVar,
                "PSR-2 linter reported errors in $path/: ".join('; ', $output)
            );
        }
    }
}
