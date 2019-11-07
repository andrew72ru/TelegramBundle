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
 * @todo Implement Methods\GetChat
 */
class Chat
{
    const TYPE_PRIVATE = 'private';
    const TYPE_GROUP = 'group';
    const TYPE_SUPERGROUP = 'supergroup';
    const TYPE_CHANNEL = 'channel';

    /**
     * @var int Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
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
    private $first_name;

    /**
     * @var string|null Optional. Last name of the other party in a private chat
     */
    private $last_name;

    /**
     * @var bool|null Optional. True if a group has ‘All Members Are Admins’ enabled.
     */
    private $all_members_are_administrators;

    /**
     * @var \StdClass|null Optional. Chat photo. Returned only in getChat.
     *
     * @todo Implement class
     */
    private $photo;

    /**
     * @var string|null Optional. Description, for supergroups and channel chats. Returned only in getChat.
     */
    private $description;

    /**
     * @var string|null Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     */
    private $invite_link;

    /**
     * @var string|null Optional. Pinned message, for supergroups and channel chats. Returned only in getChat.
     */
    private $pinned_message;

    /**
     * @var string|null Optional. For supergroups, name of group sticker set. Returned only in getChat.
     */
    private $sticker_set_name;

    /**
     * @var bool|null Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     */
    private $can_set_sticker_set;

    /**
     * Chat constructor.
     *
     * @param \StdClass $chat
     */
    public function __construct(\StdClass $chat)
    {
        foreach (get_object_vars($this) as $objectVar => $value) {
            $method = AbstractEntity::formatString($objectVar);
            if (method_exists($this, $method) && property_exists($chat, $objectVar)) {
                $this->{$method}($chat->{$objectVar});
            }
        }
    }

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
        $types = ['private', 'group', 'supergroup', 'channel'];
        if (!in_array($type, $types)) {
            $type = 'private';
        }

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
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     *
     * @return Chat
     */
    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     *
     * @return Chat
     */
    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllMembersAreAdministrators(): ?bool
    {
        return $this->all_members_are_administrators;
    }

    /**
     * @param bool|null $all_members_are_administrators
     *
     * @return Chat
     */
    public function setAllMembersAreAdministrators(?bool $all_members_are_administrators): self
    {
        $this->all_members_are_administrators = $all_members_are_administrators;

        return $this;
    }

    /**
     * @return \StdClass|null
     */
    public function getPhoto(): ?\StdClass
    {
        return $this->photo;
    }

    /**
     * @param \StdClass $photo
     *
     * @return Chat
     */
    public function setPhoto(?\StdClass $photo): self
    {
        if (!is_null($photo)) {
            $this->photo = $photo;
        }

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
        return $this->invite_link;
    }

    /**
     * @param string|null $invite_link
     *
     * @return Chat
     */
    public function setInviteLink(?string $invite_link): self
    {
        $this->invite_link = $invite_link;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPinnedMessage(): ?string
    {
        return $this->pinned_message;
    }

    /**
     * @param string|null $pinned_message
     *
     * @return Chat
     */
    public function setPinnedMessage(?string $pinned_message): self
    {
        $this->pinned_message = $pinned_message;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStickerSetName(): ?string
    {
        return $this->sticker_set_name;
    }

    /**
     * @param string|null $sticker_set_name
     *
     * @return Chat
     */
    public function setStickerSetName(?string $sticker_set_name): self
    {
        $this->sticker_set_name = $sticker_set_name;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSetStickerSet(): ?bool
    {
        return $this->can_set_sticker_set;
    }

    /**
     * @param bool|null $can_set_sticker_set
     *
     * @return Chat
     */
    public function setCanSetStickerSet(?bool $can_set_sticker_set): self
    {
        $this->can_set_sticker_set = $can_set_sticker_set;

        return $this;
    }
}
