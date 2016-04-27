<?php
declare(strict_types = 1);

namespace WyriHaximus\Travis\Resource\Async;

use Rx\Observable;
use Rx\ObservableInterface;
use Rx\React\Promise;
use WyriHaximus\Travis\Resource\Repository as BaseRepository;
use function React\Promise\resolve;

class Repository extends BaseRepository
{
    public function builds(): ObservableInterface
    {
        return Promise::toObservable($this->getTransport()->request('repos/' . $this->slug() . '/builds'))
            ->flatMap(function ($x) {
                return Observable::fromArray($x['builds']);
            })
            ->map(function ($build) : Build {
                return $this->getTransport()->hydrate(Build::class, $build);
            });
    }
}
