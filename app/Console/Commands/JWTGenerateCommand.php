<?php
declare(strict_types=1);

namespace App\Console\Commands;

/**
 * Class JWTGenerateCommand
 *
 * @package App\Console\Commands
 */
class JWTGenerateCommand extends \Tymon\JWTAuth\Commands\JWTGenerateCommand
{

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->fire();
    }
}
