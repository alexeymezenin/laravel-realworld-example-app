<?php declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleFilterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Tag::factory()
            ->has(Article::factory())
            ->count(5)
            ->create();
    }

    /** @test */
    public function article_filter_by_tag_name()
    {
        $tag = Tag::factory()
            ->has(Article::factory())
            ->create(['name' => 'testfilter']);

        $response = $this->getJson(route('api:articles:index', [
            'tag' => 'testfilter'
        ]));

        $response->assertSuccessful();
        $response->assertJsonCount(1, 'articles');
        $response->assertJsonFragment(['slug' => $tag->articles->first()->slug]);
    }

    /** @test */
    public function article_filter_empty_result()
    {
        $response = $this->getJson(route('api:articles:index', [
            'tag' => 'testfilter'
        ]));

        $response->assertSuccessful();
        $response->assertJsonCount(0, 'articles');
    }
}
