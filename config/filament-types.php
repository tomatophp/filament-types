<?php

return [
    "for" => [
        "posts" => "posts",
        "accounts" => "accounts",
    ],
    "types" => [
        "posts" => [
            "category" => "category",
            "tag" => "tag",
        ],
        "accounts" => [
            "user" => "user",
            "admin" => "admin",
        ]
    ],

    "middleware" => ['auth:sanctum'],
    "categories_resource" => null,
    "types_resource" => null,
];
