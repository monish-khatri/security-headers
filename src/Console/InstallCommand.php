<?php

namespace MonishKhatri\SecurityHeaders\Console;

use Illuminate\Console\Command;


class InstallCommand extends Command
{
    use InstallSecurityHeadersStack;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'security-headers:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attach OWASP security related headers to HTTP response';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        return $this->installSecurityHeadersStack();
    }
}
