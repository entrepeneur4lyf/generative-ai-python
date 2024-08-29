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
    /**
     * Generate a unique session ID.
     *
     * @return string The generated session ID.
     */
    public static function generateSessionId(): string
    {
        return bin2hex(random_bytes(16));
    }

    /**
     * Generate a unique message ID.
     *
     * @return string The generated message ID.
     */
    public static function generateMessageId(): string
    {
        return bin2hex(random_bytes(16));
    }

    /**
     * Format the chat history into a readable string.
     *
     * @param array $history The chat history to format.
     *
     * @return string The formatted chat history.
     */
    public static function formatChatHistory(array $history): string
    {
        return implode("\n", $history);
    }

    /**
     * Rename schema fields for compatibility.
     *
     * @param array $schema The schema to rename fields for.
     *
     * @return array The schema with renamed fields.
     */
    public static function renameSchemaFields(array $schema): array
    {
        if (isset($schema['type'])) {
            $schema['type_'] = $schema['type'];
            unset($schema['type']);
        }

        if (isset($schema['format'])) {
            $schema['format_'] = $schema['format'];
            unset($schema['format']);
        }

        if (isset($schema['items'])) {
            $schema['items'] = self::renameSchemaFields($schema['items']);
        }

        if (isset($schema['properties'])) {
            foreach ($schema['properties'] as $key => $value) {
                $schema['properties'][$key] = self::renameSchemaFields($value);
            }
        }

        return $schema;
    }
}
