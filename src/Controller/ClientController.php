<?php

declare(strict_types=1);

namespace TelegramBundle\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{JsonResponse, Request, Response};
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Contracts\HttpClient\{
    Exception\ClientExceptionInterface,
    Exception\RedirectionExceptionInterface,
    Exception\ServerExceptionInterface,
    Exception\TransportExceptionInterface
};
use TelegramBundle\Entities\Update;
use TelegramBundle\Exceptions\TelegramException;
use TelegramBundle\Interfaces\SendMessageInterface;

/**
 * Class ClientController
 * Endpoint to telegram webHook.
 */
class ClientController extends AbstractController
{
    private SendMessageInterface $sendMessageService;
    private LoggerInterface $logger;

    /**
     * ClientController constructor.
     *
     * @param SendMessageInterface $sendMessage
     * @param LoggerInterface      $logger
     */
    public function __construct(SendMessageInterface $sendMessage, LoggerInterface $logger)
    {
        $this->sendMessageService = $sendMessage;
        $this->logger = $logger;
    }

    public function indexAction(Request $request): JsonResponse
    {
        $this->logger->info((string) $request->getContent(), [
            'tag' => 'telegram.request',
        ]);
        try {
            $update = $this->sendMessageService->processRequest($request);
        } catch (TelegramException $e) {
            throw new BadRequestHttpException('Wrong data: ' . $e->getMessage());
        }

        if (($tgResponse = $update->getResponse()) !== null) {
            try {
                return new JsonResponse($tgResponse->getContent(), 200, $tgResponse->getHeaders(), true);
            } catch (TransportExceptionInterface $e) {
                throw new TelegramException($e->getMessage(), (int) $e->getCode());
            } catch (ClientExceptionInterface | RedirectionExceptionInterface | ServerExceptionInterface $e) {
                return new JsonResponse([
                    'error' => $e->getMessage(),
                    'response' => $e->getResponse()->toArray(false),
                ], (int) $e->getCode());
            }
        }

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
