<?php

namespace app\Helper;

use Error;

class SortHelper {


    public static $VALID_ORDER = [
        'ASC', 'DESC'
    ];
    
    public static $VALID_ARTICLE_FIELDS = ['publication_date'];
    
    public static $VALID_ARTICLE_FIELD_LABELS = [
        [
            "field_name" => "publication_date",
            "label_long" => "Publication Date",
            "label_sort" => "Pub. date"
        ]
    ];

    public static function hasArticleSort(){
        return session('article_sort');
    }

    public static function getArticleSortOrder(){
        $article_sort = SortHelper::hasArticleSort();
        if($article_sort){
            return $article_sort['order'];
        }
    }

    public static function getArticleSortField(){
        $article_sort = SortHelper::hasArticleSort();
        if($article_sort){
            return $article_sort['field'];
        }
    }

    public static function updateArticleSort($field, $order){
        if(!in_array($field, SortHelper::$VALID_ARTICLE_FIELDS) || !in_array($order, SortHelper::$VALID_ORDER)){
            throw new Error("Invalid sorting order detected: ".$field." / ".$order);
        }
        session([
            "article_sort" => [
                "field" => $field,
                "order" => $order,
                "labels" => SortHelper::$VALID_ARTICLE_FIELD_LABELS,
                "orders" => SortHelper::$VALID_ORDER
            ]
        ]);
    }
}


