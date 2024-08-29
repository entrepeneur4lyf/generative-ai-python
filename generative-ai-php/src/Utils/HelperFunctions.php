<?php

declare(strict_types=1);

namespace Google\GenerativeAI\Utils;

class HelperFunctions
{
    /**
     * Flatten a nested array into a single level array, with keys representing the original path.
     *
     * @param array $updates The nested array to flatten.
     *
     * @return array The flattened array.
     */
    public static function flattenUpdatePaths(array $updates): array
    {
        $newUpdates = [];
        foreach ($updates as $key => $value) {
            if (is_array($value)) {
                foreach (self::flattenUpdatePaths($value) as $subKey => $subValue) {
                    $newUpdates["$key.$subKey"] = $subValue;
                }
            } else {
                $newUpdates[$key] = $value;
            }
        }
        return $newUpdates;
    }
}
