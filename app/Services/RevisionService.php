<?php
namespace App\Services;
use App\Models\Article;
use App\Models\ArticleRevision;


class  RevisionService {

   public function getByArticle(Article $article){
     return ArticleRevision::with(['article', 'user'])->where('article_id', $article->id)->get();
   }


   public function getRevision(Article $article, ArticleRevision $revision): ?ArticleRevision
   {
        if ($revision->article_id !== $article->id) {
            return null;
        }
        return $revision;
   }


   public function revert(Article $article, ArticleRevision $revision): Article
    {
        if ($revision->article_id !== $article->id) {
            throw new \Exception("Revision does not belong to article.");
        }

       $article->update([
      'title'       => $revision->title,
      'description' => $revision->description,
      'body'        => $revision->body,
     ]);
        return $article;
    }
}