<?php

namespace WyriHaximus\Travis;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Build implements EndpointInterface
{
    use ParentHasClientAwareTrait;

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * @var int
     */
    protected $id;

    public function __construct(Repository $repository, \stdClass $build)
    {
        $this->setParent($repository);
        $this->repository = $repository;

        $this->id = $build->id;
    }

    public function getRequest(): RequestInterface
    {
        // TODO: Implement getRequest() method.
    }

    public function fromResponse(ResponseInterface $response): EndpointInterface
    {
        // TODO: Implement fromResponse() method.
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function matrix()
    {
        return new BuildMatrix($this);
    }
}
