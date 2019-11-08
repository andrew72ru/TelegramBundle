<?php
/**
 * 08.11.2019
 */

declare(strict_types=1);


namespace TelegramBundle\Entities;

/**
 * Class ChatPermissions
 * @see https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions
{
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
     * @return bool
     */
    public function isCanSendMessages(): bool
    {
        return $this->canSendMessages;
    }

    /**
     * @param bool $canSendMessages
     * @return ChatPermissions
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
     * @return ChatPermissions
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
     * @return ChatPermissions
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
     * @return ChatPermissions
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
     * @return ChatPermissions
     */
    public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews): self
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;
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
     * @return ChatPermissions
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
     * @return ChatPermissions
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
     * @return ChatPermissions
     */
    public function setCanPinMessages(bool $canPinMessages): self
    {
        $this->canPinMessages = $canPinMessages;
        return $this;
    }
}
