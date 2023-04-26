<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Question;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class QuestionQuery extends Query
{
    protected $attributes = [
        'name' => 'question',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Question');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::id(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Question::findOrFail($args['id']);
    }
}
