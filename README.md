# Google AI PHP SDK for the Gemini API

The Google AI PHP SDK is the easiest way for PHP developers to build with the Gemini API. The Gemini API gives you access to Gemini [models](https://ai.google.dev/models/gemini) created by [Google DeepMind](https://deepmind.google/technologies/gemini/#introduction). Gemini models are built from the ground up to be multimodal, so you can reason seamlessly across text, images, and code.

## Get started with the Gemini API
1. Go to [Google AI Studio](https://aistudio.google.com/).
2. Login with your Google account.
3. [Create](https://aistudio.google.com/app/apikey) an API key. Note that in Europe the free tier is not available.

## Usage example

1. Install via Composer.

```bash
composer require google/generative-ai-php
```

2. Use the SDK and configure your API key.

```php
<?php

require 'vendor/autoload.php';

use Google\GenerativeAI\Core\GenerativeModel;

$config = [
    'api_key' => getenv('GEMINI_API_KEY'),
    'model_name' => 'gemini-1.5-flash',
];

$model = new GenerativeModel($config);
$response = $model->generateContent("The opposite of hot is");
echo $response;
```

## Documentation

See the [Gemini API Cookbook](https://github.com/google-gemini/gemini-api-cookbook/) or [ai.google.dev](https://ai.google.dev) for complete documentation.

## Contributing

See [Contributing](https://github.com/google/generative-ai-php/blob/main/CONTRIBUTING.md) for more information on contributing to the Google AI PHP SDK.

## License

The contents of this repository are licensed under the [Apache License, version 2.0](http://www.apache.org/licenses/LICENSE-2.0).
