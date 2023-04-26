<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Question;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateQuestionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createQuestion',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('Question');
    }

    public function args(): array
    {
        return [
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

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Question::create($args);
    }
}
