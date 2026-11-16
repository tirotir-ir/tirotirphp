<?php
declare(strict_types=1);

// Returns a list of error messages (empty list = valid)
function validate(array $input): array
{
    $errors = [];

    $name = trim((string) ($input["name"] ?? ""));
    if ($name === "" || mb_strlen($name) > 50) {
        $errors["name"] = "Name is required (max 50 characters).";
    }

    if (filter_var($input["email"] ?? "", FILTER_VALIDATE_EMAIL) === false) {
        $errors["email"] = "Email is not valid.";
    }

    $age = filter_var($input["age"] ?? null, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 120]]);
    if ($age === false) {
        $errors["age"] = "Age must be a whole number between 1 and 120.";
    }

    if (filter_var($input["site"] ?? "", FILTER_VALIDATE_URL) === false) {
        $errors["site"] = "Website must be a full URL.";
    }

    return $errors;
}

// In a real page, pass $_POST instead of these samples
print_r(validate(["name" => "Ali", "email" => "ali@example.com", "age" => "30", "site" => "https://example.com"]));
print_r(validate(["name" => "", "email" => "not-an-email", "age" => "200", "site" => "example"]));
