<?php

namespace App;

use GrahamCampbell\GitLab\GitLabManager;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Support\Facades\App; // you probably have this aliased already

class RepositoryAggregator
{
    protected $gitlab;
    protected $github;

    public function __construct(GitLabManager $gitlab, GitHubManager $github)
    {
        $this->gitlab = $gitlab;
        $this->github = $github;
    }

    public function aggregateRecentCommits($limit = 5)
    {
        $gitlabCommits = $this->getRecentGitlabCommits(20);

        return array_slice($gitlabCommits, 0, $limit);
    }

    private function getRecentGitlabCommits($limit)
    {
        $projects = $this->gitlab->projects()->all(
            [
                'order_by'   => 'updated_at',
                'sort'       => 'desc',
                'membership' => true,
                'per_page'   => $limit,
                'simple'     => true,
            ]
        );

        $commits = [];

        foreach ($projects as $project) {

            $projectCommits = $this->gitlab->repositories()->commits(
                $project['id'],
                [
                    'ref_name' => 'develop',
                ]
            );

            if (count($projectCommits)) {
                $mostRecentCommit = $projectCommits[0];
                $commits[] = $mostRecentCommit;
            }

        }

        return $commits;
    }

    private function getRecentGithubCommits($limit)
    {
    }
}

