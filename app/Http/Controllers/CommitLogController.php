<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GitlabCommits;

class CommitLogController extends Controller
{

    public function __construct(GitlabCommits $gitlabCommits)
    {
        $this->gitlabCommits = $gitlabCommits;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->gitlabCommits->getCommitsFromAllProjects(5);
    }

}
