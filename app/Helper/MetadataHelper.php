<?php

namespace App\Helper;

class MetadataHelper {


    public static function assembleMetadata($methodName, $data){
        if(strcmp($methodName, "show_article") == 0){
            $article = $data['article'];
            return [
                "metadata" => [
                    "head" => [
                        "title" => "Read now: \"".$article->title."\"",
                        "description" => substr($article->content, 0, 150)."...",
                        "poster" => $article->poster->name
                    ]
                ]
            ];
        }else if(strcmp($methodName, "index") == 0){
            $articles = json_decode(json_encode($data['articles']))->data;
            $article_array = [];
            for($aI = 0; $aI < count($articles); $aI++){
                array_push($article_array, $articles[$aI]);
            }
            $titles = array_slice(array_map(function($article){
                return "\"".$article->title."\"";
            }, $article_array), 0, 5);
            
            return [
                "metadata" => [
                    "head" => [
                        "title" => "Read now: \"".substr(join(', ', $titles), 0, 50)."\"",
                        "description" => "Read the following articles: ".join(', ', $titles).""
                    ]
                ]
            ];
        }else if(strcmp($methodName, "show_user_articles") == 0){
            $articles = json_decode(json_encode($data['articles']))->data;
            $article_array = [];
            for($aI = 0; $aI < count($articles); $aI++){
                array_push($article_array, $articles[$aI]);
            }
            $titles = array_slice(array_map(function($article){
                return "\"".$article->title."\"";
            }, $article_array), 0, 5);
            
            return [
                "metadata" => [
                    "head" => [
                        "title" => "Read now: \"".substr(join(', ', $titles), 0, 50)."\"",
                        "description" => "Read the following articles: ".join(', ', $titles).""
                    ]
                ]
            ];
        }
    }
}