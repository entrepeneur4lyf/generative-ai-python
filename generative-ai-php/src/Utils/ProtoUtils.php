<?php

declare(strict_types=1);

namespace Google\GenerativeAI;

use Google\Protobuf\Internal\Message;

class ProtoUtils
{
    /**
     * Convert a proto message to an associative array.
     *
     * @param Message $message The proto message to convert.
     *
     * @return array The associative array representation of the proto message.
     */
    /**
     * Convert a proto message to an associative array.
     *
     * @param Message $message The proto message to convert.
     *
     * @return array The associative array representation of the proto message.
     */
    public static function protoToArray(Message $message): array
    {
        return json_decode($message->serializeToJsonString(), true);
    }

    /**
     * Convert an associative array to a proto message.
     *
     * @param array $data The associative array to convert.
     * @param Message $message The proto message to populate.
     *
     * @return Message The populated proto message.
     */
    /**
     * Convert an associative array to a proto message.
     *
     * @param array $data The associative array to convert.
     * @param Message $message The proto message to populate.
     *
     * @return Message The populated proto message.
     */
    public static function arrayToProto(array $data, Message $message): Message
    {
        $message->mergeFromJsonString(json_encode($data));
        return $message;
    }
}
