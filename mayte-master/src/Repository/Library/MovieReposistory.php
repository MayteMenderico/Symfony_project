<?php


namespace App\Repository\Library;


use App\Entity\Library\Movie;
use Doctrine\ORM\EntityRepository;

class MovieReposistory extends EntityRepository
{

    public function getFiltredMovies(?string $title, ?string $actor, int $limit = 10, int $offset = 0)
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $expression = $queryBuilder->expr();
        $queryBuilder
            ->select(['u'])
            ->from(Movie::class, 'u');

        if ($title) {
            $queryBuilder
                ->where($expression->like('u.title', $expression->literal("%{$title}%")));
        }

        if ($actor) {
            $queryBuilder
                ->andWhere($expression->like('u.actors', $expression->literal("%{$actor}%")));
        }

        $queryBuilder->setMaxResults($limit);
        $queryBuilder->setFirstResult($offset);

        return $queryBuilder->getQuery()->getResult();
    }
}