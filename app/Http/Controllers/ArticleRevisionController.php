<?php

namespace App\Http\Controllers;


use   App\Models\Article;
use   App\Models\ArticleRevision;
use   App\Services\RevisionService;
use   App\Http\Resources\RevisionResource;
use   App\Http\Resources\RevisionCollection;
use   Illuminate\Http\Request;


class ArticleRevisionController extends Controller
{      

   protected $revisionService ;

   public  function __construct( RevisionService   $revisionService )
   {   
       $this->revisionService = $revisionService;
   }

    public function index(Article $article)
    {    
         $this->authorize('viewRevisions', $article);

        $revisions = $this->revisionService->getByArticle($article);
        return new RevisionCollection($revisions);
    }


    public function show(Article $article, ArticleRevision $revision)
    {
        $this->authorize('viewRevisions', $article);

        $revision = $this->revisionService->getRevision($article, $revision);
        if (! $revision) {
            return response()->json(['message' => 'Revision not found'], 404);
        }
        return new RevisionResource($revision);
    }



    public function  revert(Article $article, ArticleRevision $revision)
    {  
      
        $this->authorize('revert', $article);
        try {
            $article = $this->revisionService->revert($article, $revision);
            return response()->json([
                'message' => 'Article reverted successfully',
                'article' => $article,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
