<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Category;

class FlickrController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return Illuminate\View\View
     */
    public function show()
    {
        $categories = $this->getCategories();
        $selected_category = $categories[0]->name;
        
        $api = $this->callFlickerAPI($selected_category);

        $msg = $api[0];
        $results = $api[1];
        
        return view('main', compact('categories', 'selected_category', 'results', 'msg'));

        
    }

    /**
     * get all of the categories.
     *
     * @return App\Category
     */
    public function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }

    /**
     * call Flickr Image Info
     *
     * @return View
     */

    public function getImageInfo($selected_category, $photo_id)
    {
        $categories = $this->getCategories();
        $msg = "";
        try{
            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=95defdc48ccdfa26ddb3ac02d8be8ba0&photo_id=' . $photo_id . '&format=json&nojsoncallback=1';
            
            $client = new Client();
            $response = $client->get($url);
            $result = json_decode($response->getBody());

            
           
        }
        catch (Exception $e) {
            $results = [];
            $msg = "Error connecting to API";
        }
        
        return view('showinfo', compact('categories', 'selected_category', 'result', 'msg'));
    }


    /**
     * Search Flickr.
     *
     * @return View
     */
    public function searchFlickerAPI($selected_category)
    {
        $categories = $this->getCategories();
        $check_category = $categories->firstWhere('name', $selected_category);

        if ($check_category){
            $api = $this->callFlickerAPI($selected_category);

            $msg = $api[0];
            $results = $api[1];
        }
        else{
            $msg = 'Failed XXXX';
            $results = [];

        }

        return view('main', compact('categories', 'selected_category', 'results', 'msg'));
    }

    
    /**
     * call Flickr search API.
     *
     * @return View
     */
    public function callFlickerAPI($selected_category)
    {
        $msg = "";
        try{
            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=95defdc48ccdfa26ddb3ac02d8be8ba0&tags=' . $selected_category . '&per_page=10&page=1&format=json&nojsoncallback=1&extras=description ';
            
            $client = new Client();
            $response = $client->get($url);
            $jsondata = json_decode($response->getBody());
            $results = $jsondata->photos->photo;
            
        }
        catch (Exception $e) {
            $results = [];
            $msg = "Error connecting to API";
        }

        return array($msg, $results);

        
    }

}
