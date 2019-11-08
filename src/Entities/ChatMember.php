<?php
/**
 * 08.11.2019.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class ChatMember.
 *
 * @see https://core.telegram.org/bots/api#chatmember
 */
class ChatMember
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $status;

    /**
     * @var int|null
     */
    private $untilDate;

    /**
     * @var bool
     */
    private $canBeEdited = false;

    /**
     * @var bool
     */
    private $canPostMessages = false;

    /**
     * @var bool
     */
    private $canEditMessages = false;

    /**
     * @var bool
     */
    private $canDeleteMessages = false;

    /**
     * @var bool
     */
    private $canRestrictMembers = false;

    /**
     * @var bool
     */
    private $canPromoteMembers = false;

    /**
     * @var bool
     */
    private $canChangeInfo = false;

    /**
     * @var bool
     */
    private $canInviteUsers = false;

    /**
     * @var bool
     */
    private $canPinMessages = false;

    /**
     * @var bool
     */
    private $isMember = false;

    /**
     * @var bool
     */
    private $canSendMessages = false;

    /**
     * @var bool
     */
    private $canSendMediaMessages = false;

    /**
     * @var bool
     */
    private $canSendPolls = false;

    /**
     * @var bool
     */
    private $canSendOtherMessages = false;

    /**
     * @var bool
     */
    private $canAddWebPagePreviews = false;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return ChatMember
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return ChatMember
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUntilDate(): ?int
    {
        return $this->untilDate;
    }

    /**
     * @param int|null $untilDate
     *
     * @return ChatMember
     */
    public function setUntilDate(?int $untilDate): self
    {
        $this->untilDate = $untilDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanBeEdited(): bool
    {
        return $this->canBeEdited;
    }

    /**
     * @param bool $canBeEdited
     *
     * @return ChatMember
     */
    public function setCanBeEdited(bool $canBeEdited): self
    {
        $this->canBeEdited = $canBeEdited;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanPostMessages(): bool
    {
        return $this->canPostMessages;
    }

    /**
     * @param bool $canPostMessages
     *
     * @return ChatMember
     */
    public function setCanPostMessages(bool $canPostMessages): self
    {
        $this->canPostMessages = $canPostMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanEditMessages(): bool
    {
        return $this->canEditMessages;
    }

    /**
     * @param bool $canEditMessages
     *
     * @return ChatMember
     */
    public function setCanEditMessages(bool $canEditMessages): self
    {
        $this->canEditMessages = $canEditMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanDeleteMessages(): bool
    {
        return $this->canDeleteMessages;
    }

    /**
     * @param bool $canDeleteMessages
     *
     * @return ChatMember
     */
    public function setCanDeleteMessages(bool $canDeleteMessages): self
    {
        $this->canDeleteMessages = $canDeleteMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanRestrictMembers(): bool
    {
        return $this->canRestrictMembers;
    }

    /**
     * @param bool $canRestrictMembers
     *
     * @return ChatMember
     */
    public function setCanRestrictMembers(bool $canRestrictMembers): self
    {
        $this->canRestrictMembers = $canRestrictMembers;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanPromoteMembers(): bool
    {
        return $this->canPromoteMembers;
    }

    /**
     * @param bool $canPromoteMembers
     *
     * @return ChatMember
     */
    public function setCanPromoteMembers(bool $canPromoteMembers): self
    {
        $this->canPromoteMembers = $canPromoteMembers;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanChangeInfo(): bool
    {
        return $this->canChangeInfo;
    }

    /**
     * @param bool $canChangeInfo
     *
     * @return ChatMember
     */
    public function setCanChangeInfo(bool $canChangeInfo): self
    {
        $this->canChangeInfo = $canChangeInfo;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanInviteUsers(): bool
    {
        return $this->canInviteUsers;
    }

    /**
     * @param bool $canInviteUsers
     *
     * @return ChatMember
     */
    public function setCanInviteUsers(bool $canInviteUsers): self
    {
        $this->canInviteUsers = $canInviteUsers;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanPinMessages(): bool
    {
        return $this->canPinMessages;
    }

    /**
     * @param bool $canPinMessages
     *
     * @return ChatMember
     */
    public function setCanPinMessages(bool $canPinMessages): self
    {
        $this->canPinMessages = $canPinMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMember(): bool
    {
        return $this->isMember;
    }

    /**
     * @param bool $isMember
     *
     * @return ChatMember
     */
    public function setIsMember(bool $isMember): self
    {
        $this->isMember = $isMember;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanSendMessages(): bool
    {
        return $this->canSendMessages;
    }

    /**
     * @param bool $canSendMessages
     *
     * @return ChatMember
     */
    public function setCanSendMessages(bool $canSendMessages): self
    {
        $this->canSendMessages = $canSendMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanSendMediaMessages(): bool
    {
        return $this->canSendMediaMessages;
    }

    /**
     * @param bool $canSendMediaMessages
     *
     * @return ChatMember
     */
    public function setCanSendMediaMessages(bool $canSendMediaMessages): self
    {
        $this->canSendMediaMessages = $canSendMediaMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanSendPolls(): bool
    {
        return $this->canSendPolls;
    }

    /**
     * @param bool $canSendPolls
     *
     * @return ChatMember
     */
    public function setCanSendPolls(bool $canSendPolls): self
    {
        $this->canSendPolls = $canSendPolls;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanSendOtherMessages(): bool
    {
        return $this->canSendOtherMessages;
    }

    /**
     * @param bool $canSendOtherMessages
     *
     * @return ChatMember
     */
    public function setCanSendOtherMessages(bool $canSendOtherMessages): self
    {
        $this->canSendOtherMessages = $canSendOtherMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanAddWebPagePreviews(): bool
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * @param bool $canAddWebPagePreviews
     *
     * @return ChatMember
     */
    public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews): self
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;

        return $this;
    }
}
