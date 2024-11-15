<?php

namespace App\Domain\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\Web\CreateUser\v2\Input\CreateUserDTO;
use App\Controller\Web\CreateUser\v2\Output\CreatedUserDTO;
use App\Domain\ApiPlatform\GraphQL\Resolver\UserCollectionResolver;
use App\Domain\ApiPlatform\State\UserProcessor;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Table(name: 'phone_user')]
#[ORM\Entity]
#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['login' => 'partial'])]
#[ApiFilter(OrderFilter::class, properties: ['login'])]
class PhoneUser extends User
{
    #[ORM\Column(type: 'string', length: 20, nullable: false)]
    #[Groups(['elastica'])]
    private string $phone;

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function toArray(): array
    {
        return parent::toArray() + ['phone' => $this->phone];
    }
}