<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Hint;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class HintType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Hint',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of hint'
            ],
            'hint' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Content of the hint'
            ],
            'question' => [
                'type' => GraphQL::type('Question'),
                'description' => 'The question associated with the hint'
            ]
        ];
    }
}
