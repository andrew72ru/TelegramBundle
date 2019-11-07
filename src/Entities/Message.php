<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 15:53.
 */

namespace TelegramBundle\Entities;

use TelegramBundle\Exceptions\TelegramException;

/**
 * Class Message
 * Implements telegram message.
 *
 * @see https://core.telegram.org/bots/api#message
 */
class Message extends AbstractEntity
{
    /**
     * @var \StdClass
     */
    private $sourceMessage;

    /**
     * @var string
     */
    private $message_id;

    /**
     * @var User
     */
    private $from;

    /**
     * @var int
     */
    private $date;

    /**
     * @var Chat
     */
    private $chat;

    /**
     * @var User|null
     */
    private $forward_from;

    /**
     * @var Chat|null
     */
    private $forward_from_chat;

    /**
     * @var int|null
     */
    private $forward_from_message_id;

    /**
     * @var string|null
     */
    private $forward_signature;

    /**
     * @var int|null
     */
    private $forward_date;

    /**
     * @var Message|null
     */
    private $reply_to_message;

    /**
     * @var int|null
     */
    private $edit_date;

    /**
     * @var string|null
     */
    private $media_group_id;

    /**
     * @var string|null
     */
    private $author_signature;

    /**
     * @var string|null
     */
    private $text;

    /**
     * @var MessageEntity[]|array
     */
    private $entities = [];

    /**
     * @var MessageEntity[]|null
     */
    private $caption_entities;

    /**
     * @var Audio|null
     */
    private $audio;

    /**
     * @var Document|null
     */
    private $document;

    /**
     * @var PhotoSize[]|null
     */
    private $photo;

    /**
     * @var Sticker|null
     */
    private $sticker;

    /**
     * @var Video|null
     */
    private $video;

    /**
     * @var Voice|null
     */
    private $voice;

    /**
     * @var VideoNote|null
     */
    private $video_note;

    /**
     * @var string|null
     */
    private $caption;

    /**
     * @var Contact|null
     */
    private $contact;

    /**
     * @var Location|null
     */
    private $location;

    /**
     * @var User[]|null
     */
    private $new_chat_members;

    /**
     * @var User|null
     */
    private $left_chat_member;

    /**
     * @var string|null
     */
    private $new_chat_title;

    /**
     * @var PhotoSize[]|null
     */
    private $new_chat_photo;

    /**
     * Message constructor.
     *
     * @param string|\StdClass $message
     *
     * @throws TelegramException
     */
    public function __construct($message)
    {
        if (is_string($message)) {
            $messageObject = json_decode($message);

            if (JSON_ERROR_NONE !== json_last_error()) {
                throw new TelegramException('Unable to decode message: ' . json_last_error_msg());
            }
        } elseif (is_object($message)) {
            $messageObject = $message;
        } else {
            throw new TelegramException('Constructor argument of ' . __CLASS__ . ' neither string nor object');
        }
        $this->sourceMessage = $messageObject;

        $this->setMessageId(AbstractEntity::getProperty($messageObject, 'message_id'))
            ->setFrom(AbstractEntity::getProperty($messageObject, 'from'))
            ->setDate(AbstractEntity::getProperty($messageObject, 'date'))
            ->setChat(AbstractEntity::getProperty($messageObject, 'chat'))
        ;

        foreach (get_object_vars($this) as $objectVar => $value) {
            if ($value) {
                continue;
            }

            if (null !== AbstractEntity::getProperty($messageObject, $objectVar)) {
                $method = AbstractEntity::formatString($objectVar);
                if (method_exists($this, $method) && property_exists($messageObject, $objectVar)) {
                    $this->{$method}($messageObject->{$objectVar});
                }
            }
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getText();
    }

    /**
     * @return \StdClass
     */
    public function getSourceMessage(): \StdClass
    {
        return $this->sourceMessage;
    }

    /**
     * @param string $sourceMessage
     *
     * @return Message
     */
    public function setSourceMessage(\StdClass $sourceMessage): self
    {
        $this->sourceMessage = $sourceMessage;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->message_id;
    }

    /**
     * @param string $message_id
     *
     * @return Message
     */
    public function setMessageId(string $message_id): self
    {
        $this->message_id = $message_id;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param \StdClass $from
     *
     * @return Message
     */
    public function setFrom(\StdClass $from): self
    {
        $this->from = new User($from);

        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return Message
     */
    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param \StdClass $chat
     *
     * @return Message
     */
    public function setChat(\StdClass $chat): self
    {
        $this->chat = new Chat($chat);

        return $this;
    }

    /**
     * @return User|null
     */
    public function getForwardFrom(): ?User
    {
        return $this->forward_from;
    }

    /**
     * @param \StdClass|null $forward_from
     *
     * @return Message
     */
    public function setForwardFrom(?\StdClass $forward_from): self
    {
        if (!is_null($forward_from)) {
            $this->forward_from = new User($forward_from);
        }

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getForwardFromChat(): ?Chat
    {
        return $this->forward_from_chat;
    }

    /**
     * @param \StdClass|null $forward_from_chat
     *
     * @return Message
     */
    public function setForwardFromChat(?\StdClass $forward_from_chat): self
    {
        if (!is_null($forward_from_chat)) {
            $this->forward_from_chat = new Chat($forward_from_chat);
        }

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForwardFromMessageId(): ?int
    {
        return $this->forward_from_message_id;
    }

    /**
     * @param int $forward_from_message_id
     *
     * @return Message
     */
    public function setForwardFromMessageId(?int $forward_from_message_id): self
    {
        $this->forward_from_message_id = $forward_from_message_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getForwardSignature(): ?string
    {
        return $this->forward_signature;
    }

    /**
     * @param string|null $forward_signature
     *
     * @return Message
     */
    public function setForwardSignature(?string $forward_signature): self
    {
        $this->forward_signature = $forward_signature;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForwardDate(): ?int
    {
        return $this->forward_date;
    }

    /**
     * @param int|null $forward_date
     *
     * @return Message
     */
    public function setForwardDate(?int $forward_date): self
    {
        $this->forward_date = $forward_date;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage(): ?self
    {
        return $this->reply_to_message;
    }

    /**
     * @param \StdClass|null $reply_to_message
     *
     * @return Message
     *
     * @throws TelegramException
     */
    public function setReplyToMessage(?\StdClass $reply_to_message): self
    {
        if (!is_null($reply_to_message)) {
            $this->reply_to_message = new self(json_encode($reply_to_message));
        }

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEditDate(): ?int
    {
        return $this->edit_date;
    }

    /**
     * @param int|null $edit_date
     *
     * @return Message
     */
    public function setEditDate(?int $edit_date): self
    {
        $this->edit_date = $edit_date;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMediaGroupId(): ?string
    {
        return $this->media_group_id;
    }

    /**
     * @param string|null $media_group_id
     *
     * @return Message
     */
    public function setMediaGroupId(?string $media_group_id): self
    {
        $this->media_group_id = $media_group_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    /**
     * @param string|null $author_signature
     *
     * @return Message
     */
    public function setAuthorSignature(?string $author_signature): self
    {
        $this->author_signature = $author_signature;

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
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param \StdClass[]|null $entities
     *
     * @return Message
     */
    public function setEntities(?array $entities): self
    {
        if (!empty($entities)) {
            $result = [];
            foreach ($entities as $entity) {
                $result[] = new MessageEntity($entity);
            }
            $this->entities = $result;
        }

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    /**
     * @param \StdClass[]|null $caption_entities
     *
     * @return Message
     */
    public function setCaptionEntities(?array $caption_entities): self
    {
        if (!empty($caption_entities)) {
            $result = [];
            foreach ($caption_entities as $captionEntity) {
                $result[] = new MessageEntity($captionEntity);
            }
            $this->caption_entities = $caption_entities;
        }

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
     * @param \StdClass|null $audio
     *
     * @return Message
     */
    public function setAudio(?\StdClass $audio): self
    {
        if (!is_null($audio)) {
            $this->audio = new Audio($audio);
        }

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
     * @param \StdClass|null $document
     *
     * @return Message
     */
    public function setDocument(?\StdClass $document): self
    {
        if (!is_null($document)) {
            $this->document = new Document($document);
        }

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
     * @param \StdClass[]|null $photo
     *
     * @return Message
     */
    public function setPhoto(?array $photo): self
    {
        if (!empty($photo)) {
            $result = [];
            foreach ($photo as $item) {
                $result[] = new PhotoSize($item);
            }
            $this->photo = $result;
        }

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
     * @param \StdClass|null $sticker
     *
     * @return Message
     */
    public function setSticker(?\StdClass $sticker): self
    {
        if (!is_null($sticker)) {
            $this->sticker = new Sticker($sticker);
        }

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
     * @param \StdClass|null $video
     *
     * @return Message
     */
    public function setVideo(?\StdClass $video): self
    {
        if (!is_null($video)) {
            $this->video = new Video($video);
        }

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
     * @param \StdClass|null $voice
     *
     * @return Message
     */
    public function setVoice(?\StdClass $voice): self
    {
        if (!is_null($voice)) {
            $this->voice = new Voice($voice);
        }

        return $this;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->video_note;
    }

    /**
     * @param \StdClass|null $video_note
     *
     * @return Message
     */
    public function setVideoNote(?\StdClass $video_note): self
    {
        if (!is_null($video_note)) {
            $this->video_note = new VideoNote($video_note);
        }

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
     * @param \StdClass|null $contact
     *
     * @return Message
     */
    public function setContact(?\StdClass $contact): self
    {
        if (!is_null($contact)) {
            $this->contact = new Contact($contact);
        }

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
     * @param \StdClass|null $location
     *
     * @return Message
     */
    public function setLocation(?\StdClass $location): self
    {
        if (!is_null($location)) {
            $this->location = new Location($location);
        }

        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getNewChatMembers(): ?array
    {
        return $this->new_chat_members;
    }

    /**
     * @param \StdClass[]|null $new_chat_members
     *
     * @return Message
     */
    public function setNewChatMembers(?array $new_chat_members): self
    {
        if (!empty($new_chat_members)) {
            $result = [];
            foreach ($new_chat_members as $newChatMember) {
                $result = new User($newChatMember);
            }
            $this->new_chat_members = $result;
        }

        return $this;
    }

    /**
     * @return User|null
     */
    public function getLeftChatMember(): ?User
    {
        return $this->left_chat_member;
    }

    /**
     * @param \StdClass|null $left_chat_member
     *
     * @return Message
     */
    public function setLeftChatMember(?\StdClass $left_chat_member): self
    {
        $this->left_chat_member = new User($left_chat_member);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewChatTitle(): ?string
    {
        return $this->new_chat_title;
    }

    /**
     * @param string|null $new_chat_title
     *
     * @return Message
     */
    public function setNewChatTitle(?string $new_chat_title): self
    {
        $this->new_chat_title = $new_chat_title;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->new_chat_photo;
    }

    /**
     * @param \StdClass[]|null $new_chat_photo
     *
     * @return Message
     */
    public function setNewChatPhoto(?array $new_chat_photo): self
    {
        if (!empty($new_chat_photo)) {
            $result = [];
            foreach ($new_chat_photo as $item) {
                $result[] = new PhotoSize($item);
            }
            $this->new_chat_photo = $result;
        }

        return $this;
    }
}
