<?php

declare(strict_types=1);

namespace Google\GenerativeAI\Core;

use Google\GenerativeAI\Exceptions\GenerativeAIException;

class ChatSession
{
    private GenerativeModel $model;
    private array $history;

    /**
     * ChatSession constructor.
     *
     * @param GenerativeModel $model The generative model to use for the chat session.
     */
    public function __construct(GenerativeModel $model)
    {
        $this->model = $model;
        $this->history = [];
    }

    /**
     * Send a message in the chat session and receive a response.
     *
     * @param string $message The message to send.
     *
     * @return string The response from the model.
     *
     * @throws GenerativeAIException If there is an error during message sending.
     */
    /**
     * Send a message in the chat session and receive a response.
     *
     * @param string $message The message to send.
     *
     * @return string The response from the model.
     *
     * @throws GenerativeAIException If there is an error during message sending.
     */
    public function sendMessage(string $message): string
    {
        $this->history[] = $message;
        try {
            $response = $this->model->generate($message);
            $this->history[] = $response;
            return $response;
        } catch (GenerativeAIException $e) {
            throw new GenerativeAIException('Error sending message: ' . $e->getMessage());
        }
    }

    /**
     * Get the chat history.
     *
     * @return array The chat history.
     */
    /**
     * Get the chat history.
     *
     * @return array The chat history.
     */
    public function getHistory(): array
    {
        return $this->history;
    }
}
