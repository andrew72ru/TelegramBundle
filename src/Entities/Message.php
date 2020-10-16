<?php

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class Message
 * Implements telegram message.
 *
 * @see https://core.telegram.org/bots/api#message
 */
class Message
{
    /**
     * @var int|null
     */
    private ?int $messageId = null;

    /**
     * @var TelegramUser|null
     */
    private ?TelegramUser $from = null;

    /**
     * @var \DateTimeInterface|null
     */
    private ?\DateTimeInterface $date = null;

    /**
     * @var Chat|null
     */
    private ?Chat $chat = null;

    /**
     * @var TelegramUser|null
     */
    private ?TelegramUser $forwardFrom = null;

    /**
     * @var Chat|null
     */
    private ?Chat $forwardFromChat = null;

    /**
     * @var int|null
     */
    private ?int $forwardFromMessageId = null;

    /**
     * @var string|null
     */
    private ?string $forwardSignature = null;

    /**
     * @var int|null
     */
    private ?int $forwardDate = null;

    /**
     * @var Message|null
     */
    private ?Message $replyToMessage = null;

    /**
     * @var int|null
     */
    private ?int $editDate = null;

    /**
     * @var string|null
     */
    private ?string $mediaGroupId = null;

    /**
     * @var string|null
     */
    private ?string $authorSignature = null;

    /**
     * @var string|null
     */
    private ?string $text = null;

    /**
     * @var MessageEntity[]|array
     */
    private array $entities = [];

    /**
     * @var MessageEntity[]|array
     */
    private array $captionEntities = [];

    /**
     * @var Audio|null
     */
    private ?Audio $audio = null;

    /**
     * @var Document|null
     */
    private ?Document $document = null;

    /**
     * @var Animation|null
     */
    private ?Animation $animation = null;

    /**
     * @var object|null
     */
    private ?object $game = null;

    /**
     * @var PhotoSize[]|null
     */
    private ?array $photo = null;

    /**
     * @var Sticker|null
     */
    private ?Sticker $sticker = null;

    /**
     * @var Video|null
     */
    private ?Video $video = null;

    /**
     * @var Voice|null
     */
    private ?Voice $voice = null;

    /**
     * @var VideoNote|null
     */
    private ?VideoNote $videoNote = null;

    /**
     * @var string|null
     */
    private ?string $caption = null;

    /**
     * @var Contact|null
     */
    private ?Contact $contact = null;

    /**
     * @var Location|null
     */
    private ?Location $location = null;

    /**
     * @var Venue|null
     */
    private ?Venue $venue = null;

    /**
     * @var Pool|null
     */
    private ?Pool $poll = null;

    /**
     * @var TelegramUser[]|null
     */
    private ?array $newChatMembers = null;

    /**
     * @var TelegramUser|null
     */
    private ?TelegramUser $leftChatMember = null;

    /**
     * @var string|null
     */
    private ?string $newChatTitle = null;

    /**
     * @var PhotoSize[]|null
     */
    private ?array $newChatPhoto = null;

    /**
     * @var bool
     */
    private bool $deleteChatPhoto = false;

    /**
     * @var bool
     */
    private bool $groupChatCreated = false;

    /**
     * @var bool
     */
    private bool $supergroupChatCreated = false;

    /**
     * @var bool
     */
    private bool $channelChatCreated = false;

    /**
     * @var int|null
     */
    private ?int $migrateToChatId = null;

    /**
     * @var int|null
     */
    private ?int $migrateFromChatId = null;

    /**
     * @var Message|null
     */
    private ?Message $pinnedMessage = null;

    /**
     * @var object|null
     *
     * @todo implement
     */
    private ?object $invoice = null;

    /**
     * @var object|null
     *
     * @todo implement
     */
    private ?object $successfulPayment = null;

    /**
     * @var string|null
     */
    private ?string $connectedWebsite = null;

    /**
     * @var object|null
     *
     * @todo implement
     */
    private ?object $passportData = null;

    /**
     * @var InlineKeyboardMarkup|null
     */
    private ?InlineKeyboardMarkup $replyMarkup = null;

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     *
     * @return Message
     */
    public function setMessageId(int $messageId): self
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * @return TelegramUser|null
     */
    public function getFrom(): ?TelegramUser
    {
        return $this->from;
    }

    /**
     * @param TelegramUser $from
     *
     * @return Message
     */
    public function setFrom(TelegramUser $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     *
     * @return Message
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     *
     * @return Message
     */
    public function setChat(Chat $chat): self
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return TelegramUser|null
     */
    public function getForwardFrom(): ?TelegramUser
    {
        return $this->forwardFrom;
    }

    /**
     * @param TelegramUser|null $forwardFrom
     *
     * @return Message
     */
    public function setForwardFrom(?TelegramUser $forwardFrom): self
    {
        $this->forwardFrom = $forwardFrom;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getForwardFromChat(): ?Chat
    {
        return $this->forwardFromChat;
    }

    /**
     * @param Chat|null $forwardFromChat
     *
     * @return Message
     */
    public function setForwardFromChat(?Chat $forwardFromChat): self
    {
        $this->forwardFromChat = $forwardFromChat;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForwardFromMessageId(): ?int
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @param int|null $forwardFromMessageId
     *
     * @return Message
     */
    public function setForwardFromMessageId(?int $forwardFromMessageId): self
    {
        $this->forwardFromMessageId = $forwardFromMessageId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getForwardSignature(): ?string
    {
        return $this->forwardSignature;
    }

    /**
     * @param string|null $forwardSignature
     *
     * @return Message
     */
    public function setForwardSignature(?string $forwardSignature): self
    {
        $this->forwardSignature = $forwardSignature;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForwardDate(): ?int
    {
        return $this->forwardDate;
    }

    /**
     * @param int|null $forwardDate
     *
     * @return Message
     */
    public function setForwardDate(?int $forwardDate): self
    {
        $this->forwardDate = $forwardDate;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message|null $replyToMessage
     *
     * @return Message
     */
    public function setReplyToMessage(?Message $replyToMessage): self
    {
        $this->replyToMessage = $replyToMessage;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEditDate(): ?int
    {
        return $this->editDate;
    }

    /**
     * @param int|null $editDate
     *
     * @return Message
     */
    public function setEditDate(?int $editDate): self
    {
        $this->editDate = $editDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMediaGroupId(): ?string
    {
        return $this->mediaGroupId;
    }

    /**
     * @param string|null $mediaGroupId
     *
     * @return Message
     */
    public function setMediaGroupId(?string $mediaGroupId): self
    {
        $this->mediaGroupId = $mediaGroupId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->authorSignature;
    }

    /**
     * @param string|null $authorSignature
     *
     * @return Message
     */
    public function setAuthorSignature(?string $authorSignature): self
    {
        $this->authorSignature = $authorSignature;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @return Message
     */
    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return array|MessageEntity[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @param array|MessageEntity[] $entities
     *
     * @return Message
     */
    public function setEntities(array $entities): self
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @param MessageEntity $entity
     *
     * @return $this
     */
    public function addEntity(MessageEntity $entity): self
    {
        if (\in_array($entity, $this->entities, true) === false) {
            $this->entities[] = $entity;
        }

        return $this;
    }

    public function removeEntity(MessageEntity $entity): self
    {
        $key = \array_search($entity, $this->entities, true);
        if ($key !== false) {
            unset($this->entities[$key]);
        }

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param MessageEntity[]|null $captionEntities
     *
     * @return Message
     */
    public function setCaptionEntities(?array $captionEntities): self
    {
        $this->captionEntities = $captionEntities ?? [];

        return $this;
    }

    /**
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @param Audio|null $audio
     *
     * @return Message
     */
    public function setAudio(?Audio $audio): self
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param Document|null $document
     *
     * @return Message
     */
    public function setDocument(?Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     *
     * @return Message
     */
    public function setAnimation(?Animation $animation): self
    {
        $this->animation = $animation;

        return $this;
    }

    /**
     * @return object|null
     */
    public function getGame(): ?object
    {
        return $this->game;
    }

    /**
     * @param object|null $game
     *
     * @return Message
     */
    public function setGame(?object $game): self
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[]|null $photo
     *
     * @return Message
     */
    public function setPhoto(?array $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     *
     * @return Message
     */
    public function setSticker(?Sticker $sticker): self
    {
        $this->sticker = $sticker;

        return $this;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     *
     * @return Message
     */
    public function setVideo(?Video $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @param Voice|null $voice
     *
     * @return Message
     */
    public function setVoice(?Voice $voice): self
    {
        $this->voice = $voice;

        return $this;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->videoNote;
    }

    /**
     * @param VideoNote|null $videoNote
     *
     * @return Message
     */
    public function setVideoNote(?VideoNote $videoNote): self
    {
        $this->videoNote = $videoNote;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     *
     * @return Message
     */
    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     *
     * @return Message
     */
    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     *
     * @return Message
     */
    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @param Venue|null $venue
     *
     * @return Message
     */
    public function setVenue(?Venue $venue): self
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * @return Pool|null
     */
    public function getPoll(): ?Pool
    {
        return $this->poll;
    }

    /**
     * @param Pool|null $poll
     *
     * @return Message
     */
    public function setPoll(?Pool $poll): self
    {
        $this->poll = $poll;

        return $this;
    }

    /**
     * @return TelegramUser[]|null
     */
    public function getNewChatMembers(): ?array
    {
        return $this->newChatMembers;
    }

    /**
     * @param TelegramUser[]|null $newChatMembers
     *
     * @return Message
     */
    public function setNewChatMembers(?array $newChatMembers): self
    {
        $this->newChatMembers = $newChatMembers;

        return $this;
    }

    /**
     * @return TelegramUser|null
     */
    public function getLeftChatMember(): ?TelegramUser
    {
        return $this->leftChatMember;
    }

    /**
     * @param TelegramUser|null $leftChatMember
     *
     * @return Message
     */
    public function setLeftChatMember(?TelegramUser $leftChatMember): self
    {
        $this->leftChatMember = $leftChatMember;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewChatTitle(): ?string
    {
        return $this->newChatTitle;
    }

    /**
     * @param string|null $newChatTitle
     *
     * @return Message
     */
    public function setNewChatTitle(?string $newChatTitle): self
    {
        $this->newChatTitle = $newChatTitle;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->newChatPhoto;
    }

    /**
     * @param PhotoSize[]|null $newChatPhoto
     *
     * @return Message
     */
    public function setNewChatPhoto(?array $newChatPhoto): self
    {
        $this->newChatPhoto = $newChatPhoto;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleteChatPhoto(): bool
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param bool $deleteChatPhoto
     *
     * @return Message
     */
    public function setDeleteChatPhoto(bool $deleteChatPhoto): self
    {
        $this->deleteChatPhoto = $deleteChatPhoto;

        return $this;
    }

    /**
     * @return bool
     */
    public function isGroupChatCreated(): bool
    {
        return $this->groupChatCreated;
    }

    /**
     * @param bool $groupChatCreated
     *
     * @return Message
     */
    public function setGroupChatCreated(bool $groupChatCreated): self
    {
        $this->groupChatCreated = $groupChatCreated;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSupergroupChatCreated(): bool
    {
        return $this->supergroupChatCreated;
    }

    /**
     * @param bool $supergroupChatCreated
     *
     * @return Message
     */
    public function setSupergroupChatCreated(bool $supergroupChatCreated): self
    {
        $this->supergroupChatCreated = $supergroupChatCreated;

        return $this;
    }

    /**
     * @return bool
     */
    public function isChannelChatCreated(): bool
    {
        return $this->channelChatCreated;
    }

    /**
     * @param bool $channelChatCreated
     *
     * @return Message
     */
    public function setChannelChatCreated(bool $channelChatCreated): self
    {
        $this->channelChatCreated = $channelChatCreated;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int|null $migrateToChatId
     *
     * @return Message
     */
    public function setMigrateToChatId(?int $migrateToChatId): self
    {
        $this->migrateToChatId = $migrateToChatId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrateFromChatId;
    }

    /**
     * @param int|null $migrateFromChatId
     *
     * @return Message
     */
    public function setMigrateFromChatId(?int $migrateFromChatId): self
    {
        $this->migrateFromChatId = $migrateFromChatId;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @param Message|null $pinnedMessage
     *
     * @return Message
     */
    public function setPinnedMessage(?Message $pinnedMessage): self
    {
        $this->pinnedMessage = $pinnedMessage;

        return $this;
    }

    /**
     * @return object|null
     */
    public function getInvoice(): ?object
    {
        return $this->invoice;
    }

    /**
     * @param object|null $invoice
     *
     * @return Message
     */
    public function setInvoice(?object $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return object|null
     */
    public function getSuccessfulPayment(): ?object
    {
        return $this->successfulPayment;
    }

    /**
     * @param object|null $successfulPayment
     *
     * @return Message
     */
    public function setSuccessfulPayment(?object $successfulPayment): self
    {
        $this->successfulPayment = $successfulPayment;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connectedWebsite;
    }

    /**
     * @param string|null $connectedWebsite
     *
     * @return Message
     */
    public function setConnectedWebsite(?string $connectedWebsite): self
    {
        $this->connectedWebsite = $connectedWebsite;

        return $this;
    }

    /**
     * @return object|null
     */
    public function getPassportData(): ?object
    {
        return $this->passportData;
    }

    /**
     * @param object|null $passportData
     *
     * @return Message
     */
    public function setPassportData(?object $passportData): self
    {
        $this->passportData = $passportData;

        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup|null $replyMarkup
     *
     * @return Message
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;

        return $this;
    }
}
