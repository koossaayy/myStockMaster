<?php

declare(strict_types=1);

namespace App\Helpers;

class GitHandler
{
    private ?string $message = null;

    public function checkForUpdates(): bool
    {
        $branch = env('GIT_BRANCH', 'master');
        exec('git fetch origin ' . $branch, $output, $return);

        if ($return === 0) {
            exec('git rev-parse HEAD', $localHead, $return);
            exec('git rev-parse FETCH_HEAD', $remoteHead, $return);

            if ($localHead !== $remoteHead) {
                $this->message = sprintf(__('Updates available on origin/%s.'), $branch);

                return true;
            } else {
                $this->message = __('No updates available.');

                return false;
            }
        } else {
            $this->message = sprintf(__('Error fetching updates from origin/%s.'), $branch);

            return false;
        }
    }

    public function fetchAndPull(): string
    {
        $branch = env('GIT_BRANCH', 'master');
        exec('git fetch origin ' . $branch, $output, $return);

        if ($return === 0) {
            $this->message = sprintf(__('Fetched updates from origin/%s.'), $branch);
            exec('git merge origin/' . $branch, $output, $return);

            if ($return === 0) {
                $this->message = sprintf(__('Merged updates from origin/%s.'), $branch);
            } else {
                $this->message = sprintf(__('Error merging updates from origin/%s.'), $branch);
            }
        } else {
            $this->message = sprintf(__('Error fetching updates from origin/%s.'), $branch);
        }

        return $this->message;
    }
}
