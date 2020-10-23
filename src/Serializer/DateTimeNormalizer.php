<?php

declare(strict_types=1);

namespace TelegramBundle\Serializer;

use Symfony\Component\Serializer\Exception\{
    BadMethodCallException,
    CircularReferenceException,
    ExceptionInterface,
    ExtraAttributesException,
    InvalidArgumentException,
    LogicException,
    RuntimeException,
    UnexpectedValueException
};
use Symfony\Component\Serializer\Normalizer\{
    CacheableSupportsMethodInterface,
    DateTimeNormalizer as BaseDateTimeNormalizer,
    DenormalizerInterface,
    NormalizerInterface
};
use DateTimeInterface;

class DateTimeNormalizer implements NormalizerInterface, DenormalizerInterface, CacheableSupportsMethodInterface
{
    private BaseDateTimeNormalizer $inner;

    public function __construct(BaseDateTimeNormalizer $inner)
    {
        $this->inner = $inner;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return $this->inner->hasCacheableSupportsMethod();
    }

    /**
     * Denormalizes data back into an object of the given class.
     *
     * @param mixed       $data    Data to restore
     * @param string      $type    The expected class to instantiate
     * @param string|null $format  Format the given data was extracted from
     * @param array       $context Options available to the denormalizer
     *
     * @return object|array
     *
     * @throws BadMethodCallException   Occurs when the normalizer is not called in an expected context
     * @throws InvalidArgumentException Occurs when the arguments are not coherent or not supported
     * @throws UnexpectedValueException Occurs when the item cannot be hydrated with the given data
     * @throws ExtraAttributesException Occurs when the item doesn't have attribute to receive given data
     * @throws LogicException           Occurs when the normalizer is not supposed to denormalize
     * @throws RuntimeException         Occurs if the class cannot be instantiated
     * @throws ExceptionInterface       Occurs for all the other cases of errors
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        if (\is_numeric($data)) {
            $data = \date_create((string) $data)->format(DateTimeInterface::ATOM);
        }

        return $this->inner->denormalize($data, $type, $format, $context);
    }

    /**
     * Checks whether the given class is supported for denormalization by this normalizer.
     *
     * @param mixed       $data   Data to denormalize from
     * @param string      $type   The class to which the data should be denormalized
     * @param string|null $format The format being deserialized from
     *
     * @return bool
     */
    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        return $this->inner->supportsDenormalization($data, $type, $format);
    }

    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param mixed       $object  Object to normalize
     * @param string|null $format  Format the normalization result will be encoded as
     * @param array       $context Context options for the normalizer
     *
     * @return array|string|int|float|bool|\ArrayObject|null \ArrayObject is used to make sure an empty object is encoded as an object not an array
     *
     * @throws InvalidArgumentException   Occurs when the object given is not a supported type for the normalizer
     * @throws CircularReferenceException Occurs when the normalizer detects a circular reference when no circular
     *                                    reference handler can fix it
     * @throws LogicException             Occurs when the normalizer is not called in an expected context
     * @throws ExceptionInterface         Occurs for all the other cases of errors
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return $this->inner->normalize($object, $format, $context);
    }

    /**
     * Checks whether the given class is supported for normalization by this normalizer.
     *
     * @param mixed       $data   Data to normalize
     * @param string|null $format The format being (de-)serialized from or into
     *
     * @return bool
     */
    public function supportsNormalization($data, string $format = null): bool
    {
        return $this->inner->supportsNormalization($data, $format);
    }
}
