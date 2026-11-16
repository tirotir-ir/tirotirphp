<?php
declare(strict_types=1);

namespace App;

use DateTimeImmutable;

// A trait is a reusable set of methods that can be mixed into classes
trait Timestamps
{
    private ?DateTimeImmutable $createdAt = null;

    public function touch(): void
    {
        $this->createdAt = new DateTimeImmutable();
    }

    public function createdAt(): ?string
    {
        return $this->createdAt?->format("Y-m-d H:i:s");
    }
}

class Post
{
    use Timestamps;

    public function __construct(public string $title)
    {
    }
}

$post = new Post("Hello PHP");
$post->touch();
echo $post->title . " @ " . $post->createdAt() . PHP_EOL;

// ::class gives the fully qualified class name
echo Post::class . PHP_EOL;
