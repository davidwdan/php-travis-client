<?php
declare(strict_types = 1);

namespace WyriHaximus\Travis;

use Rx\ObservableInterface;
use Rx\React\Promise;
use WyriHaximus\Travis\Resource\Async\Repository;
use WyriHaximus\Travis\Transport\Client as Transport;
use WyriHaximus\Travis\Transport\Factory;
use function React\Promise\resolve;

class AsyncClient
{
    protected $transport;

    public function __construct(Transport $transport = null)
    {
        if (!($transport instanceof Transport)) {
            $transport = Factory::create();
        }
        $this->transport = $transport;
    }

    public function repository(string $repository): ObservableInterface
    {
        return Promise::toObservable($this->transport->request('repos/' . $repository))
            ->map(function ($json) : Repository {
                return $this->transport->hydrate(Repository::class, $json['repo']);
            });
    }
}
