<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
//use GuzzleHttp\Client;
use Goutte\Client as GouteClient;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;

use App\Models\Product;

class ScrapeProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape all available products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // for ($i = 1; $i < 7; $i++) {
        //     // Instantiate the HTTP client and the DOM crawler
        //     $client = new Client();
        //     $crawler = new Crawler();
        //     // code to be executed 6 times
        //     // Send a GET request to the product page
        //     $url = 'https://sugargang.com/collections/alle-produkte?page=' . $i;
        //     $response = $client->request('GET', $url);

        //     // Load the HTML content into the DOM crawler
        //     $html = (string) $response->getBody();
        //     $crawler->addHtmlContent($html);

        //     // Extract the product information using the DOM crawler
        //     $products = [];
        //     $crawler->filter('.product-item')->each(function (Crawler $node, $i) use (&$products) {
        //         $title = trim($node->filter('.product-item__title')->text());
        //         $price = 0;
        //         $sku = "pc";
        //         $node->filter('div.product-item__price-info')->each(function (Crawler $unit, $i) use (&$price, &$sku) {
        //             $price = $unit->filter('div.unit-price-measurement span.unit-price-measurement__price')->text();
        //             $sku = $unit->filter('div.unit-price-measurement span.unit-price-measurement__reference-unit')->text();
        //         });
                
        //         $url = "https://sugargang.com" . $node->filter('a.product-item__image-wrapper')->attr('href');
        //         $ingredients = "";
        //         $image = $node->filter('a.product-item__image-wrapper div.aspect-ratio');
        //         $image = $image->filterXPath('//noscript/img')->attr('src');
                
                
        //         $products[] = [
        //             'title' => $title,
        //             'price' => $price,
        //             'sku' => $sku,
        //             'image' => $image,
        //             'url' => $url,
        //             'ingredients' => $ingredients,
        //             'qty' => 0,
        //         ];
        //     });

        //     // Output the products to the console or save them to a database
        //     foreach ($products as $productData) {

        //         $product = Product::where('url', $productData['url'])->first();

        //         if ($product) {
        //             // The product already exists in the database
        //             $product->title = $productData['title'];
        //             $product->price = $productData['price'];
        //             $product->sku = $productData['sku'];
        //             $product->image = $productData['image'];
        //             $product->url = $productData['url'];
        //             //$product->ingredients = $productData['ingredients'];
        //             $product->qty = $productData['qty'];
            
        //             $product->save();

        //             $this->info("Product: " . $productData['title'] . " is updated");
        //         } else {
        //             // The product does not exist in the database
        //             $product = Product::create([
        //                 'title' => $productData['title'],
        //                 'price' => $productData['price'],
        //                 'sku' => $productData['sku'],
        //                 'image' => $productData['image'],
        //                 'url' => $productData['url'],
        //                 'ingredients' => $productData['ingredients'],
        //                 'qty' => $productData['qty'],
        //             ]);
        //             $this->info("Successfully Saved: " . $productData['title']);
        //         }
        //     }

        //     // Get Ingredients and Update
        //     foreach ($products as $productData) {

        //         $product = Product::where('url', $productData['url'])->first();

        //         if ($product) {
                    
        //             ///////////////////////////// ingredients ////////////////////////////////////////////////
        //             $this->info("Getting Ingredients ... : " . $productData['url']);
        //             $ingredients = "";

        //             try {
        //                 // Your code that may throw the "Failed to connect" exception
        //                 $p_client = new Client();
        //                 $p_crawler = new Crawler();
        //                 $p_response = $p_client->request('GET', $productData['url']);

        //                 // Load the HTML content into the DOM crawler
        //                 $p_html = (string) $p_response->getBody();
        //                 $p_crawler->addHtmlContent($p_html);
                        
        //                 $p_crawler->filter('.product-block-list__item--description')->each(function (Crawler $desc, $i) use (&$ingredients) {
        //                     $ingredients .= trim($desc->filter('div.card')->text());
        //                 });
        //             } catch (\Exception $e) {
        //                 // Handle the exception here
        //                 $this->info("Error: " . $e->getMessage());
        //             }
                    
        //             ///////////////////////////// ingredients ////////////////////////////////////////////////

        //             // The product already exists in the database
        //             $product->ingredients = $ingredients;
        //             $product->save();
        //         }
        //     }
        // }

        $allProductUrl = 'https://sugargang.com/collections/alle-produkte';
        $client = new GouteClient();
        $crawler = $client->request('GET', $allProductUrl);
        $handles = [];

        $crawler->filter('.product-item')->each(function ($node) use (&$handles) {
            $handle = $node->filter('.product-item__image-wrapper')->attr('href');
            $handle = str_replace('/products/', '', $handle);
            $handles[] = $handle;
        });

        //$responseArray = [];

        $file = 'sugardad.txt';
        $di = 1;
        foreach ($handles as $handle) {
            $productUrl = 'https://sugargang.com/products/' . $handle;
            $guzzleClient = new GuzzleClient();
            $headers = [
            'Accept' => 'application/json'
            ];
            $request = new Request('GET', $productUrl, $headers);
            $res = $guzzleClient->sendAsync($request)->wait();
            $response = $res->getBody();
            $responseArray = json_decode($response, true);
            
            $this->info($di . ". Getting data from: " . $productUrl . "<br>");
            $di += 1;
            // $product = new Product($responseArray);
            // $product->save();
            file_put_contents($file, PHP_EOL . $response, FILE_APPEND);
        }

        //print_r($responseArray);

        $this->info('Scraping completed!');



        //$this->info("DONE SUCCESS!");
    }
}
