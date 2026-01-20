<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @OA\Tag(name="Books")
 */
#[Route(path: '/book', name: 'book')]
class BookController extends AbstractSimpleApiController
{
}