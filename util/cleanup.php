<?php

class cleanup {

    public static function delete($start, $end, $string) {
        $startPos = strpos($string, $start);
        $endPos = strpos($string, $end);

        if ($startPos === false || $endPos === false) {
            return $string;
        }

        $textToDelete = substr($string, $startPos, ($endPos + strlen($end)) - $startPos);

        return str_replace($textToDelete, '', $string);
    }

    static function excerpts($content, $word_limit = 30) {
        $words = explode(" ", $content);

        return implode(" ", array_splice($words, 0, $word_limit));
    }

    static function clean_all($start, $end, $string) {

    }

    static function firstImageExcerpt($post_excerpt) {

        $reg_exp= '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
        preg_match_all($reg_exp, $post_excerpt, $matches);
        $first_img = $matches[0][0];

        $post_excerpt = str_replace($first_img, '', $post_excerpt);
        $post_excerpt = $first_img . $post_excerpt;
        return $post_excerpt;
    }

}
