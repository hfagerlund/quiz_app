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

class UpdateHintMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateHint',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('Hint');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'hint' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'question_id' => [
                'name' => 'question_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:questions,id']
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $hint = Hint::findOrFail($args['id']);

        $hint->update($args);

        return $hint->refresh();
    }
}
