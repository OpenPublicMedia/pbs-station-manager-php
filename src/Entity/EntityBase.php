<?php
/** @noinspection PhpUnused */
declare(strict_types=1);


namespace OpenPublicMedia\PbsStationManager\Entity;

use DateTime;
use Exception;
use InvalidArgumentException;
use Jawira\CaseConverter\CaseConverterException;
use Jawira\CaseConverter\Convert;

/**
 * Base functionality for entities.
 *
 * @package OpenPublicMedia\PbsStationManager\Entity
 */
abstract class EntityBase
{
    /**
     * Base entity constructor.
     *
     * @param array $apiAttributes
     *   Attributes response from the API. Assumes snake_case key-value pairs.
     */
    public function __construct(array $apiAttributes = [])
    {
        foreach ($apiAttributes as $key => $value) {
            // Ignore null and empty string values.
            if (is_null($value) || $value === '') {
                continue;
            }

            // Convert snake_case keys to camelCase.
            try {
                $keyValue = new Convert('set_' . $key);
                $method = $keyValue->toCamel();
            } catch (CaseConverterException $e) {
                throw new InvalidArgumentException(
                    'Could not handle attribute key: ' . $key,
                    $e->getCode(),
                    $e
                );
            }

            // Verify that the property is valid.
            if (!method_exists($this, $method)) {
                throw new InvalidArgumentException('Invalid property key: ' . $key);
            }

            // Convert string datetime values (assume format with timezone).
            if ($key === 'created_at' || $key === 'updated_at') {
                try {
                    $value = new DateTime($value);
                } catch (Exception $e) {
                    throw new InvalidArgumentException(
                        sprintf('Could not convert datetime string: %s (key: %s)', $value, $key),
                        $e->getCode(),
                        $e
                    );
                }
            }

            $this->{$method}($value);
        }
    }
}
