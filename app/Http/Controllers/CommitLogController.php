<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RepositoryAggregator;

class CommitLogController extends Controller
{

    public function __construct(RepositoryAggregator $repositoryAggregator)
    {
        $this->repositoryAggregator = $repositoryAggregator;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repositoryAggregator->aggregateRecentCommits(5);
    }

}
