<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 16:02.
 */

namespace TelegramBundle\Entities;

/**
 * Class MessageEntity.
 *
 * @see https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity
{
    public const E_HASHTAG = 'hashtag';
    public const E_BOT_COMMAND = 'bot_command';
    public const E_URL = 'url';
    public const E_BOLD = 'bold';
    public const E_ITALIC = 'italic';
    public const E_CODE = 'code';
    public const E_PRE = 'pre';
    public const E_TEXT_LINK = 'text_link';
    public const E_TEXT_MENTION = 'text_mention';
    public const E_EMAIL = 'email';

    /**
     * @var string Can be mention (@username),
     *             hashtag, bot_command, url, email, bold (bold text), italic (italic text), code (monowidth string),
     *             pre (monowidth block), text_link (for clickable text URLs), text_mention
     */
    private $type;

    /**
     * @var int Offset in UTF-16 code units to the start of the entity
     */
    private $offset;

    /**
     * @var int Length of the entity in UTF-16 code units
     */
    private $length;

    /**
     * @var string|null Optional. For “text_link” only, url that will be opened after user taps on the text
     */
    private $url;

    /**
     * @var TelegramUser|null Optional. For “text_mention” only, the mentioned user
     */
    private $user;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return MessageEntity
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     *
     * @return MessageEntity
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     *
     * @return MessageEntity
     */
    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     *
     * @return MessageEntity
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return TelegramUser|null
     */
    public function getUser(): ?TelegramUser
    {
        return $this->user;
    }

    /**
     * @param TelegramUser|null $user
     *
     * @return MessageEntity
     */
    public function setUser(?TelegramUser $user): self
    {
        $this->user = $user;

        return $this;
    }
}
