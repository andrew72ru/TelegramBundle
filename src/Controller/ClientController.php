<?php
declare(strict_types=1);

namespace TelegramBundle\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use TelegramBundle\Exceptions\TelegramException;
use TelegramBundle\Interfaces\SendMessageInterface;

/**
 * Class ClientController
 * Endpoint to telegram webhook.
 */
class ClientController extends AbstractController
{
    /**
     * @var SendMessageInterface
     */
    private $sendMessageService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * ClientController constructor.
     */
    public function __construct(SendMessageInterface $sendMessage, LoggerInterface $logger)
    {
        $this->sendMessageService = $sendMessage;
        $this->logger = $logger;
    }

    public function indexAction(Request $request): JsonResponse
    {
        $this->logger->info($request->getContent());
        try {
            $update = $this->sendMessageService->processRequest($request);
        } catch (TelegramException $e) {
            throw new BadRequestHttpException('Wrong data: ' . $e->getMessage());
        }

        if ($tgResponse = $update->getResponse()) {
            return new JsonResponse($tgResponse->getBody()->getContents(), 200, $tgResponse->getHeaders(), true);
        }

        return $this->json([]);
    }
}
