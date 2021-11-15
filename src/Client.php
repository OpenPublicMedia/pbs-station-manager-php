<?php
declare(strict_types=1);


namespace OpenPublicMedia\PbsStationManager;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use League\Uri\Components\Query;
use League\Uri\Parser;
use League\Uri\Parser\QueryString;
use OpenPublicMedia\PbsStationManager\Entity\Station;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

/**
 * PBS Station Manager API Client.
 *
 * @url https://docs.pbs.org/display/SMA
 *
 * @package OpenPublicMedia\PbsStationManager
 */
class Client
{
    /**
     * Base URI for the public API.
     *
     * @url https://docs.pbs.org/display/SM/Station+Manager+Public+API#StationManagerPublicAPI-Endpoints
     */
    const PUBLIC = "https://station.services.pbs.org/api/public/v1/";

    /**
     * Base URI for the internal API.
     *
     * @url https://docs.pbs.org/display/SM/Station+Manager+Internal+API#StationManagerInternalAPI-Endpoints
     */
    const INTERNAL = "https://station.services.pbs.org/api/v1/";

    /**
     * Maximum number of objects to return in an API response.
     *
     * @url https://docs.pbs.org/display/SM/Station+Manager+Public+API#StationManagerPublicAPI-Pagination
     */
    const MAX_PAGE_SIZE = 50;

    /**
     * Client for handling API requests
     *
     * @var GuzzleClient
     */
    protected GuzzleClient $client;

    /**
     * Client constructor.
     *
     * @param string|null $key
     *   API client key.
     * @param string|null $secret
     *   API client secret.
     * @param string|null $base_uri
     *   Base API URI.
     * @param array|null $options
     *   Additional options to pass to Guzzle client.
     */
    public function __construct(
        ?string $key = null,
        ?string $secret = null,
        ?string $base_uri = null,
        ?array $options = []
    ) {
        if (!$base_uri && $key && $secret) {
            $options['base_uri'] = self::INTERNAL;
            $options['auth'] = [$key, $secret];
        } elseif (!$base_uri) {
            $options['base_uri'] = self::PUBLIC;
        }
        $this->client = new GuzzleClient($options);
    }

    /**
     * @param string $method
     *   Request method (e.g. 'get', 'post', 'put', etc.).
     * @param string $endpoint
     *   API endpoint to query.
     * @param array $query
     *   Additional query parameters in the form `param => value`.
     *
     * @return ResponseInterface
     *   Response data from the API.
     */
    public function request(string $method, string $endpoint, array $query = []): ResponseInterface
    {
        try {
            $response = $this->client->request($method, $endpoint, [
                'query' => self::buildQuery($query)
            ]);
        } catch (GuzzleException $e) {
            throw new RuntimeException($e->getMessage());
        }
        if ($response->getStatusCode() != 200) {
            // Implementors should handle this as the API responds 404 for
            // invalid IDs.
            throw new RuntimeException($response->getReasonPhrase(), $response->getStatusCode());
        }
        return $response;
    }

    /**
     * Gets a complete list of objects by paging through all results.
     *
     * @param string $endpoint
     *   URL to query.
     * @param array $query
     *   Additional query parameters in the form `param => value`.
     *
     * @return array
     *   All data returned from the API.
     */
    public function getAll(string $endpoint, array $query = []): array
    {
        $results = [];
        $page = 1;

        if (!isset($query['page-size'])) {
            $query['page-size'] = self::MAX_PAGE_SIZE;
        }

        do {
            $query = ['page' => $page] + $query;
            $response = $this->request('get', $endpoint, $query);
            $page = json_decode($response->getBody()->getContents(), true);
            foreach ($page['data'] as $station) {
                $results[$station['id']] = new Station($station['id'], $station['attributes']);
            }
        } while ($page = self::getNextPage($page));

        return $results;
    }

    /**
     * Gets a single object by ID from an API request.
     *
     * @param string $endpoint
     *   URL to query.
     * @param string $id
     *   GUID of an API object.
     * @param array $query
     *   Additional query parameters in the form `param => value`.
     *
     * @return array|null
     *   Single record from the API or null.
     */
    public function getOne(string $endpoint, string $id, array $query = []): ?array
    {
        $response = $this->request('get', $endpoint . '/' . $id, $query);
        $data = json_decode($response->getBody()->getContents(), true);
        if (!empty($data['data'])) {
            return $data['data'];
        }
        return null;
    }

    /**
     * Searches a JSON response for a link containing next page information.
     *
     * @param array $response
     *   A full response from the API.
     *
     * @return int|null
     *   The number of the next page or null if there is not a next page.
     */
    private static function getNextPage(array $response): ?int
    {
        $page = null;
        if (isset($response['links']) && isset($response['links']['next'])
            && !empty($response['links']['next'])) {
            $parser = new Parser();
            $query = $parser($response['links']['next'])['query'];
            $page = (int) QueryString::extract($query)['page'];
        }
        return $page;
    }

    /**
     * Creates a query string from an array of parameters.
     *
     * @param array $parameters
     *   Query parameters keyed to convert to "key=value".
     *
     * @return string
     *   All parameters as a string.
     */
    public static function buildQuery(array $parameters): string
    {
        $query = Query::createFromParams($parameters)
            ->withoutEmptyPairs()
            ->withoutNumericIndices();

        if ($query->count() === 0) {
            return '';
        }

        // The `withoutNumericIndices` method above removes the _numeric_ part
        // of the index only, leaving behind the "[]" so e.g. "id[2]" becomes
        // "id[]". For Station Manager we only want to repeat the query
        // parameter, so we must further replace e.g. "id[]" with just "id". The
        // query content is in RFC 3986 format so encoded characters are used
        // for the replacement.
        return str_replace('%5B%5D=', '=', $query->getContent());
    }

    /**
     * Gets a single Station by GUID.
     *
     * This method will trigger a RuntimeException error if the provided GUID
     * is not valid. Implementors should handle this exception.
     *
     * @url https://docs.pbs.org/display/SM/Station+Manager+Internal+API#StationManagerInternalAPI-Station:get
     *
     * @param string $id
     *   GUID of the Station to get.
     *
     * @return Station
     *   Single Station instance.
     *
     * @throws RuntimeException
     */
    public function getStation(string $id): Station
    {
        $data = $this->getOne('stations', $id);
        return new Station($data['id'], $data['attributes']);
    }

    /**
     * Gets all Stations.
     *
     * @url https://docs.pbs.org/display/SM/Station+Manager+Internal+API#StationManagerInternalAPI-Station:list
     *
     * @param array $ids
     *   GUIDs of specific stations to get.
     *
     * @return array
     *   Station instances keyed by Station GUID.
     */
    public function getStations(array $ids = []): array
    {
        return $this->getAll('stations', ['id' => $ids]);
    }
}
