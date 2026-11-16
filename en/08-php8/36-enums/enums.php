<?php
declare(strict_types=1);

enum Status: string
{
    case Draft = "draft";
    case Published = "published";
    case Archived = "archived";

    public function label(): string
    {
        return match ($this) {
            self::Draft     => "Draft",
            self::Published => "Published",
            self::Archived  => "Archived",
        };
    }
}

// from() throws on unknown values, tryFrom() returns null
$status = Status::from("published");
echo $status->label() . PHP_EOL;
echo (Status::tryFrom("deleted")?->label() ?? "unknown") . PHP_EOL;

foreach (Status::cases() as $case) {
    echo $case->name . " = " . $case->value . PHP_EOL;
}
