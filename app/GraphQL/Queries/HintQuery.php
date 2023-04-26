<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Hint;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class HintQuery extends Query
{
    protected $attributes = [
        'name' => 'hint',
        'description' => 'A query'
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
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return Hint::findOrFail($args['id']);
    }
}
