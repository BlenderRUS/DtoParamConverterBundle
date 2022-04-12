<?php

declare(strict_types=1);

namespace Pfilsx\DtoParamConverter\Tests\Fixtures\Controller;

use Pfilsx\DtoParamConverter\Annotation\DtoResolver;
use Pfilsx\DtoParamConverter\Request\ParamConverter\DtoParamConverter;
use Pfilsx\DtoParamConverter\Tests\Fixtures\Dto\TestDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class SimpleController extends AbstractController
{
    /**
     * @Route("/test", methods={"GET"})
     *
     * @DtoResolver({
     *     DtoParamConverter::OPTION_PRELOAD_ENTITY: false
     * })
     *
     * @param TestDto $dto
     *
     * @return JsonResponse
     */
    public function getAction(TestDto $dto): JsonResponse
    {
        return $this->json($dto);
    }

    /**
     * @Route("/test/strict", methods={"GET"})
     *
     * @DtoResolver({
     *     DtoParamConverter::OPTION_PRELOAD_ENTITY: false,
     *     DtoParamConverter::OPTION_SERIALIZER_CONTEXT: {"disable_type_enforcement": false}
     * })
     *
     * @param TestDto $dto
     *
     * @return JsonResponse
     */
    public function getActionWithOverloadedSerializerContext(TestDto $dto): JsonResponse
    {
        return $this->json($dto);
    }

    /**
     * @Route("/test/{id}", methods={"GET"})
     *
     * @param TestDto $dto
     *
     * @return JsonResponse
     */
    public function getWithPreloadAction(TestDto $dto): JsonResponse
    {
        return $this->json($dto);
    }

    /**
     * @Route("/test", methods={"POST"})
     *
     * @param TestDto $dto
     *
     * @return JsonResponse
     */
    public function postAction(TestDto $dto): JsonResponse
    {
        return $this->json($dto);
    }

    /**
     * @Route("/test", methods={"PATCH"})
     * @DtoResolver({
     *     DtoParamConverter::OPTION_PRELOAD_ENTITY: false
     * })
     *
     * @param TestDto $dto
     *
     * @return JsonResponse
     */
    public function patchAction(TestDto $dto): JsonResponse
    {
        return $this->json($dto);
    }

    /**
     * @Route("/test/{id}", methods={"PATCH"})
     *
     * @param TestDto $dto
     *
     * @return JsonResponse
     */
    public function patchWithPreloadAction(TestDto $dto): JsonResponse
    {
        return $this->json($dto);
    }
}
