<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Hint;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateHintMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createHint',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('Hint');
    }

    public function args(): array
    {
        return [
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

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Hint::create($args);
    }
}
