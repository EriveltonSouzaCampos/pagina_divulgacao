<?php

namespace Wpae\App\Service\VariationOptions;


use Wpae\Pro\Filtering\FilteringCPT;

class VariationOptions implements VariationOptionsInterface
{
    public function getQueryWhere($wpdb, $where, $join, $closeBracket = false)
    {
        return $this->defaultQuery($wpdb, $where, $join, $closeBracket);
    }

    public function preProcessPost(\WP_Post $entry)
    {
        return $entry;
    }

    /**
     * @param $wpdb
     * @param $where
     * @param $join
     * @param $closeBracket
     * @return string
     *
     * TODO: Remove $closeBracket flag
     */
    protected function defaultQuery($wpdb, $where, $join, $closeBracket)
    {


        if($closeBracket) {
            $sql = " AND $wpdb->posts.post_type = 'product' AND $wpdb->posts.ID NOT IN (SELECT o.ID FROM $wpdb->posts o
                            LEFT OUTER JOIN $wpdb->posts r
                            ON o.post_parent = r.ID
                            WHERE r.post_status = 'trash' AND o.post_type = 'product_variation')) 
                            OR ($wpdb->posts.post_type = 'product_variation'  AND $wpdb->posts.post_status <> 'trash' 

                            AND $wpdb->posts.post_parent IN (
                            SELECT DISTINCT $wpdb->posts.ID
                            FROM $wpdb->posts $join
                            WHERE $where
                        )
                          ".$this->getVariationsWhere($where, $join)."
                        
                        )";
        } else {
            $sql = " AND $wpdb->posts.post_type = 'product' AND $wpdb->posts.ID NOT IN (SELECT o.ID FROM $wpdb->posts o
                            LEFT OUTER JOIN $wpdb->posts r
                            ON o.post_parent = r.ID
                            WHERE r.post_status = 'trash' AND o.post_type = 'product_variation') 
                            OR ($wpdb->posts.post_type = 'product_variation' AND $wpdb->posts.post_status <> 'trash' 
                               
                         
                            AND $wpdb->posts.post_parent IN (
                            SELECT DISTINCT $wpdb->posts.ID
                            FROM $wpdb->posts $join
                            WHERE $where
                        )
                        
                              ".$this->getVariationsWhere($where, $join)."
                        
                        
                        )";
        }

        return $sql;

    }
}