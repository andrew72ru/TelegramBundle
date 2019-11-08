<?php
/**
 * 08.11.2019
 */

declare(strict_types=1);


namespace TelegramBundle\Entities;

/**
 * Class MaskPosition
 * @see https://core.telegram.org/bots/api#maskposition
 */
class MaskPosition
{
    /**
     * @var string
     */
    private $point;

    /**
     * @var float
     */
    private $xShift;

    /**
     * @var float
     */
    private $yShift;

    /**
     * @var float
     */
    private $scale;

    /**
     * @return string
     */
    public function getPoint(): string
    {
        return $this->point;
    }

    /**
     * @param string $point
     * @return MaskPosition
     */
    public function setPoint(string $point): self
    {
        $this->point = $point;
        return $this;
    }

    /**
     * @return float
     */
    public function getXShift(): float
    {
        return $this->xShift;
    }

    /**
     * @param float $xShift
     * @return MaskPosition
     */
    public function setXShift(float $xShift): self
    {
        $this->xShift = $xShift;
        return $this;
    }

    /**
     * @return float
     */
    public function getYShift(): float
    {
        return $this->yShift;
    }

    /**
     * @param float $yShift
     * @return MaskPosition
     */
    public function setYShift(float $yShift): self
    {
        $this->yShift = $yShift;
        return $this;
    }

    /**
     * @return float
     */
    public function getScale(): float
    {
        return $this->scale;
    }

    /**
     * @param float $scale
     * @return MaskPosition
     */
    public function setScale(float $scale): self
    {
        $this->scale = $scale;
        return $this;
    }
}
