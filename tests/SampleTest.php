<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SampleTest extends TestCase
{
    public function testTrueIsTrue(): void
    {
        $this->assertTrue(true);
    }

    public function testCountTokens(): void
    {
        $config = [
            'api_key' => 'test_api_key',
            'model_name' => 'test_model',
        ];
        $model = new GenerativeModel($config);

        $this->assertEquals(3, $model->countTokens('Hello world!'));
        $this->assertEquals(5, $model->countTokens('This is a test.'));
        $this->assertEquals(0, $model->countTokens(''));
        $this->assertEquals(1, $model->countTokens('   single   '));
    }
}
