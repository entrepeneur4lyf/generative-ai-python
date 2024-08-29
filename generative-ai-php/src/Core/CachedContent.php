<?php

declare(strict_types=1);

namespace Google\GenerativeAI\Core;

use Google\GenerativeAI\Exceptions\GenerativeAIException;
use Google\GenerativeAI\GenerativeAIClient;
use Google\Protobuf\Timestamp;

class CachedContent
{
    private GenerativeAIClient $client;
    private string $name;
    private string $model;
    private string $displayName;
    private array $usageMetadata;
    private \DateTime $createTime;
    private \DateTime $updateTime;
    private \DateTime $expireTime;

    public function __construct(GenerativeAIClient $client, string $name)
    {
        $this->client = $client;

        if (!str_contains($name, 'cachedContents/')) {
            $name = 'cachedContents/' . $name;
        }

        // TODO: Implement API call to fetch CachedContent data
        // For now, we'll use placeholder data
        $this->name = $name;
        $this->model = 'models/gemini-pro';
        $this->displayName = 'Example Cached Content';
        $this->usageMetadata = ['totalTokenCount' => 100];
        $this->createTime = new \DateTime();
        $this->updateTime = new \DateTime();
        $this->expireTime = new \DateTime('+1 hour');
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function getUsageMetadata(): array
    {
        return $this->usageMetadata;
    }

    public function getCreateTime(): \DateTime
    {
        return $this->createTime;
    }

    public function getUpdateTime(): \DateTime
    {
        return $this->updateTime;
    }

    public function getExpireTime(): \DateTime
    {
        return $this->expireTime;
    }

    public function __toString(): string
    {
        return "CachedContent(
            name='{$this->name}',
            model='{$this->model}',
            displayName='{$this->displayName}',
            usageMetadata=" . json_encode($this->usageMetadata) . ",
            createTime={$this->createTime->format('Y-m-d H:i:s')},
            updateTime={$this->updateTime->format('Y-m-d H:i:s')},
            expireTime={$this->expireTime->format('Y-m-d H:i:s')}
        )";
    }

    /**
     * Count tokens in the given prompt using the generative model.
     *
     * @param string $prompt The input prompt for token counting.
     *
     * @return int The number of tokens in the prompt.
     *
     * @throws GenerativeAIException If there is an error during the token counting.
     */
    public function countTokens(string $prompt): int
    {
        // Implement the API call to count tokens using the generative model
        try {
            $response = $this->client->countTokens($this->name, $prompt);
            return $response->getTokenCount();
        } catch (\Exception $e) {
            throw new GenerativeAIException('Error counting tokens: ' . $e->getMessage());
        }
    }
}
<?php

declare(strict_types=1);

namespace Google\GenerativeAI\Core;

use Google\GenerativeAI\Exceptions\GenerativeAIException;

class ChatSession
{
    private GenerativeModel $model;
    private array $history;

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
    public function getHistory(): array
    {
        return $this->history;
    }
}
