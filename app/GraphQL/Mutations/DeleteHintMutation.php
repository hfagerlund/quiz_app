<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Hint;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class DeleteHintMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteHint',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:hints']
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $question = Hint::findOrFail($args['id']);

        return  $question->delete() ? true : false;
    }
}
