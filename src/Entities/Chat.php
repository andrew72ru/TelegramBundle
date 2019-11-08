<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 15:58.
 */

namespace TelegramBundle\Entities;

/**
 * Class Chat.
 *
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat
{
    public const TYPE_PRIVATE = 'private';
    public const TYPE_GROUP = 'group';
    public const TYPE_SUPERGROUP = 'supergroup';
    public const TYPE_CHANNEL = 'channel';

    /**
     * @var int Unique identifier for this chat.
     *          This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it.
     *          But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     */
    private $id;

    /**
     * @var string Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     */
    private $type;

    /**
     * @var string|null Optional. Title, for supergroups, channels and group chats
     */
    private $title;

    /**
     * @var string|null Optional. Username, for private chats, supergroups and channels if available
     */
    private $username;

    /**
     * @var string|null Optional. First name of the other party in a private chat
     */
    private $firstName;

    /**
     * @var string|null Optional. Last name of the other party in a private chat
     */
    private $lastName;

    /**
     * @var bool|null Optional. True if a group has ‘All Members Are Admins’ enabled.
     */
    private $allMembersAreAdministrators;

    /**
     * @var ChatPhoto|null Optional. Chat photo. Returned only in getChat.
     */
    private $photo;

    /**
     * @var string|null Optional. Description, for supergroups and channel chats. Returned only in getChat.
     */
    private $description;

    /**
     * @var string|null Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     */
    private $inviteLink;

    /**
     * @var string|null Optional. Pinned message, for supergroups and channel chats. Returned only in getChat.
     */
    private $pinnedMessage;

    /**
     * @var string|null Optional. For supergroups, name of group sticker set. Returned only in getChat.
     */
    private $stickerSetName;

    /**
     * @var bool|null Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     */
    private $canSetStickerSet;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Chat
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

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
     * @return Chat
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return Chat
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @return Chat
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @return Chat
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return Chat
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllMembersAreAdministrators(): ?bool
    {
        return $this->allMembersAreAdministrators;
    }

    /**
     * @param bool|null $allMembersAreAdministrators
     *
     * @return Chat
     */
    public function setAllMembersAreAdministrators(?bool $allMembersAreAdministrators): self
    {
        $this->allMembersAreAdministrators = $allMembersAreAdministrators;

        return $this;
    }

    /**
     * @return ChatPhoto|null
     */
    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    /**
     * @param ChatPhoto|null $photo
     *
     * @return Chat
     */
    public function setPhoto(?ChatPhoto $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return Chat
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }

    /**
     * @param string|null $inviteLink
     *
     * @return Chat
     */
    public function setInviteLink(?string $inviteLink): self
    {
        $this->inviteLink = $inviteLink;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPinnedMessage(): ?string
    {
        return $this->pinnedMessage;
    }

    /**
     * @param string|null $pinnedMessage
     *
     * @return Chat
     */
    public function setPinnedMessage(?string $pinnedMessage): self
    {
        $this->pinnedMessage = $pinnedMessage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStickerSetName(): ?string
    {
        return $this->stickerSetName;
    }

    /**
     * @param string|null $stickerSetName
     *
     * @return Chat
     */
    public function setStickerSetName(?string $stickerSetName): self
    {
        $this->stickerSetName = $stickerSetName;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSetStickerSet(): ?bool
    {
        return $this->canSetStickerSet;
    }

    /**
     * @param bool|null $canSetStickerSet
     *
     * @return Chat
     */
    public function setCanSetStickerSet(?bool $canSetStickerSet): self
    {
        $this->canSetStickerSet = $canSetStickerSet;

        return $this;
    }
}
