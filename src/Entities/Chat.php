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

}
