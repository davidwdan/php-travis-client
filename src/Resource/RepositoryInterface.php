<?php

namespace WyriHaximus\Travis\Resource;

use DateTimeInterface;

/**
 * @link https://docs.travis-ci.com/api#repositories
 */
interface RepositoryInterface
{
    public function id() : int;

    public function slug() : string;

    public function description() : string;

    public function lastBuildId() : int;

    public function lastBuildNumber() : int;

    public function lastBuildState() : string;

    public function lastBuildDuration() : int;

    public function lastBuildStartedAt() : DateTimeInterface;

    public function lastBuildFinishedAt() : DateTimeInterface;

    public function githubLanguage() : string;
}
