<?php

declare(strict_types=1);

namespace App\GraphQL\Query;

use Menumbing\GraphQL\Annotation\Validate;
use TheCodingMachine\GraphQLite\Annotations\Query;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class HelloWorldQuery
{
    #[Query]
    public function sayHello(#[Validate(rule: 'required', messages: ['required' => 'Nama tidak boleh kosong'])] string $name): string
    {
        return 'Hello ' . $name;
    }
}
