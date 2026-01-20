<?php

namespace App\Controller\User;

use App\Controller\AbstractSimpleApiController;
use App\Entity\User\User;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @OA\Tag(name="User")
 */
#[Route(path: '/user', name: 'api_user')]
class UserController extends AbstractSimpleApiController
{
    public const ?string entityClass = User::class;
    public const ?array serializationGroups = ['user_short'];
    public const ?array serializationAttributes = ['id', 'username', 'email', 'createdAt', 'updatedAt'];

    /**
     * @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\Schema(ref=@Model(type=User::class, groups={}))
     * ),
     *
     * @OA\Response(response="401", ref="#/components/schemas/401"),
     * @OA\Response(response="403", ref="#/components/schemas/403"),
     * @OA\Response(response="415", ref="#/components/schemas/415"),
     * @OA\Response(response="422", ref="#/components/schemas/422")
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route(path: '/me', name: '_get_me', methods: ['GET'])]
    public function getMeAction(): Response
    {
        $serializer = $this->container->get('serializer');
        $data = $serializer->serialize($this->getUser(), 'json', ['attributes' => static::serializationAttributes]);

        return $this->renderResponse($data, Response::HTTP_OK);
    }

}
