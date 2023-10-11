<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class HomeController extends Controller
{
    function index()
    {
        $f = FeedReader::read('https://jabar.nu.or.id/rss.xml');

        $news_list = collect([]);
        $result = [
            'title' => $f->get_title(),
            'description' => $f->get_description(),
            'permalink' => $f->get_permalink(),
            'link' => $f->get_link(),
            'copyright' => $f->get_copyright(),
            'language' => $f->get_language(),
            'image_url' => $f->get_image_url(),
            'author' => $f->get_author()

        ];

        foreach ($f->get_items(0, $f->get_item_quantity()) as $item) {
            $news_list->push([
                'title' => $item->get_title(),
                'description' => $item->get_description(),
                'id' => $item->get_id(),
                'content' => $item->get_content(),
                'thumbnail' => $item->get_thumbnail(),
                'category' => $item->get_category(),
                'categories' => $item->get_categories(),
                'author' => $item->get_author(),
                'authors' => $item->get_authors(),
                'contributor' => $item->get_contributor(),
                'copyright' => $item->get_copyright(),
                'date' => $item->get_date(),
                'updated_date' => $item->get_updated_date(),
                'local_date' => $item->get_local_date(),
                'permalink' => $item->get_permalink(),
                'link' => $item->get_link(),
                'links' => $item->get_links(),
                'enclosures' => $item->get_enclosures(),
                'source' => $item->get_source()

            ]);
        }

        return view('welcome',['news_list'=>$news_list]);
    }
}
