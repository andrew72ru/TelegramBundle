<?php
/**
 * 08.11.2019.
 */

declare(strict_types=1);

namespace App\Tests;

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $encoders = [
            new JsonEncoder(),
        ];
        $normalizers = [
            new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter(), null, new ReflectionExtractor()),
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
        ];

        $this->serializer = new Serializer($normalizers, $encoders);
    }
}
