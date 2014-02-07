<?php

/**
 * Api/SearchController is used for the "smart" search throughout the site.
 * it returns and array of products (with type and icon specified) so that the selectize.js plugin 
 * can render the search results properly
 **/

class ApiSearchController extends BaseController {
	
	public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;
	}
	
	public function appendURL($data, $prefix)
	{
		// operate on the item passed by reference, adding the url based on slug
		foreach ($data as $key => & $item) {
			debug( print_r($item) );
			$item['url'] = url($prefix.'/'.$item['hash']);
		}
		return $data;
	}

	public function index()
	{
		// Retrieve the user's input and escape it
		$query = e(Input::get('q',''));

		debug ( $query . "\n" );
	
		// If the input is empty, return an error response
		if(!$query && $query == '') return Response::json(array(), 400);
	
		$products = ProductModel::where('status', 'like','published')
					->where('title','like','%'.$query.'%')
					->orderBy('title','asc')
					->take(5)
					->get(array('hash','title'))->toArray();
	
		// $categories = ProductCategoryModel::where('title','like','%'.$query.'%')
		// 			->has('products')
		// 			->take(5)
		// 			->get(array('slug', 'title'))
		// 			->toArray();
		
		// Data normalization
		// $categories = $this->appendValue($categories, url('img/icons/category-icon.png'),'icon');
		
		$products   = $this->appendURL($products, 'products');
		// $categories = $this->appendURL($categories, 'categories');
		
		// Add type of data to each item of each set of results
		$products   = $this->appendValue($products, 'product', 'class');
		// $categories = $this->appendValue($categories, 'category', 'class');
	
		// Normalize data
		// Add type of data to each item of each set of results
		// Merge all data into one array
		$data = array_merge($products);
	
		return Response::json(array(
			'data'=>$data
		));
	}

}