<?php

namespace App\Representations;

use Carbon\Carbon;

class Commit
{
    protected $shortMessage;
    protected $authorName;
    protected $avatar;
    protected $projectName;
    protected $timestamp;

    public function setShortMessage(String $shortMessage)
    {
        $this->shortMessage = $shortMessage;
    }

    public function getShortMessage()
    {
        return $this->shortMessage;
    }

    public function setAuthorName(String $authorName)
    {
        $this->authorName = $authorName;
    }

    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function setAvatar(String $avatarUrl)
    {
        $this->avatar = $avatarUrl;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setProjectName(String $projectName)
    {
        $this->projectName = $projectName;
    }

    public function getProjectName()
    {
        return $this->projectName;
    }

    public function setTimestamp(Carbon $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function toArray()
    {
        return [
            'shortMessage' => $this->getShortMessage(),
            'authorName'   => $this->getAuthorName(),
            'avatar'       => $this->getAvatar(),
            'projectName'  => $this->getProjectName(),
            'timestamp'    => $this->getTimestamp()->toRfc822String(),
        ];
    }
}
