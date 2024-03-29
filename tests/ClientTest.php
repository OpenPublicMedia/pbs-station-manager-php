<?php
declare(strict_types=1);


namespace OpenPublicMedia\PbsStationManager\Test;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use OpenPublicMedia\PbsStationManager\Client;
use OpenPublicMedia\PbsStationManager\Entity\LivestreamFeed;
use OpenPublicMedia\PbsStationManager\Entity\Station;
use PHPUnit\Framework\TestCase;
use RuntimeException;

/**
 * Class ClientTest
 *
 * @coversDefaultClass \OpenPublicMedia\PbsStationManager\Client
 *
 * @package OpenPublicMedia\PbsStationManager\Test
 */
class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    protected Client $publicClient;

    /**
     * @var Client
     */
    protected Client $internalClient;

    /**
     * @var MockHandler
     */
    protected MockHandler $mockHandler;

    /**
     * Create clients with mock handler.
     */
    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler();
        $this->publicClient = new Client(
            null,
            null,
            null,
            ['handler' => $this->mockHandler]
        );
        $this->internalClient = new Client(
            'api_key',
            'secret',
            null,
            ['handler' => $this->mockHandler]
        );
    }

    /**
     * @param string $name
     *   Base file name for a JSON fixture file.
     *
     * @return Response
     *   Guzzle 200 response with JSON body content.
     */
    private function jsonResponse(string $name): Response
    {
        return new Response(
            200,
            ['Content-Type' => 'application/json'],
            file_get_contents(__DIR__ . '/fixtures/' . $name . '.json')
        );
    }

    public function testGetStationRuntimeException(): void
    {
        $this->mockHandler->append(new Response(
            404,
            ['Content-Type' => 'application/json'],
            json_encode(['details' => 'Not found.'])
        ));
        $this->expectException(RuntimeException::class);
        $this->publicClient->getStation('invalid_id');
    }

    public function testGetStationPublic(): void
    {
        $this->mockHandler->append($this->jsonResponse('getStation-public'));
        $stations = $this->publicClient->getStation('guid');
        $this->assertInstanceOf(Station::class, $stations);
    }

    public function testGetStationsPublic(): void
    {
        $this->mockHandler->append($this->jsonResponse('getStations-public-1'));
        $this->mockHandler->append($this->jsonResponse('getStations-public-2'));
        $stations = $this->publicClient->getStations();
        $this->assertCount(4, $stations);
        $this->assertInstanceOf(Station::class, current($stations));
    }

    public function testGetStationInternal(): void
    {
        $this->mockHandler->append($this->jsonResponse('getStation-internal'));
        $station = $this->internalClient->getStation('guid');
        $this->assertInstanceOf(Station::class, $station);

        foreach ($station->getLivestreamFeeds() as $livestreamFeed) {
            $this->assertInstanceOf(LivestreamFeed::class, $livestreamFeed);
        }
    }

    public function testGetStationsInternal(): void
    {
        $this->mockHandler->append($this->jsonResponse('getStations-internal-1'));
        $this->mockHandler->append($this->jsonResponse('getStations-internal-2'));
        $stations = $this->internalClient->getStations();
        $this->assertCount(4, $stations);
        $this->assertInstanceOf(Station::class, current($stations));
    }

    public function testBuildGetQuery()
    {
        $this->assertEquals(
            'id=one&id=two&id=three',
            Client::buildQuery(['id' => ['one', 'two', 'three']])
        );
    }
}
