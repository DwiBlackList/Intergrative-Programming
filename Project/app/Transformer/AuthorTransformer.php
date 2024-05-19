<?php

namespace App\Transformer;

use App\Models\Author;
use League\Fractal\TransformerAbstract;

class AuthorTransformer extends TransformerAbstract
{
    // protected $availableIncludes = [
    //     'books'
    // ];

    // public function includeBooks(Author $author)
    // {
    //     return $this->collection($author->books, new BookTransformer());
    // }

    // /**
    //  * Transform an author model
    //  *
    //  * @param Author $author
    //  * @return array
    //  */
    // public function transform(Author $author)
    // {
    //     return [
    //         'id' => $author->id,
    //         'name' => $author->name,
    //         'gender' => $author->gender,
    //         'biography' => $author->biography,
    //         'created' => $author->created_at->toIso8601String(),
    //         'updated' => $author->created_at->toIso8601String(),
    //     ];
    // }

    protected array $availableIncludes = [
        'books'
    ];

    public function transform(Author $author)
    {
        return [
            'id' => (int) $author->id,
            'name' => $author->name,
            'gender' => $author->gender,
            'biography' => $author->biography,
            'created' => $author->created_at->toIso8601String(),
            'updated' => $author->created_at->toIso8601String(),
            // add other author attributes here
        ];
    }

    public function includeBooks($author)
    {
        $books = $author->books; // Assuming $author has a 'books' relationship
        return $this->collection($books, new BookTransformer());
    }
}
