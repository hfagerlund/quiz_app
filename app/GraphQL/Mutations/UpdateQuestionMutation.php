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

class UpdateQuestionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateQuestion',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('Question');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of question'
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

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $question = Question::findOrFail($args['id']);

        $question->update($args);

        return $question->refresh();
    }
}
