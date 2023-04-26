<?php

declare(strict_types=1);

namespace App\GraphQL\Types;
use App\Models\Question;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class QuestionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Question',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'Auto-incremented ID of question'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the question'
            ],
            'body' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Content of the question'
            ],
            'hints' => [
                'type' => Type::listOf(GraphQL::type('Hint')),
                'description' => 'List of hints per question'
            ]
        ];
    }
}
