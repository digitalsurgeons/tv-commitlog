<?php

namespace App;

use GrahamCampbell\GitLab\GitLabManager;
use Illuminate\Support\Facades\App; // you probably have this aliased already

class GitlabCommits
{
    protected $gitlab;

    public function __construct(GitLabManager $gitlab)
    {
        $this->gitlab = $gitlab;
    }

    public function getCommitsFromAllProjects($limit = 5)
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
            $projectCommits = $this->gitlab->repositories()->commits($project['id']);
            $mostRecentCommit = $projectCommits[0];
            $commits[] = $mostRecentCommit;
        }

        return $commits;
    }
}

