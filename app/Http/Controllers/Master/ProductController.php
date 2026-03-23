<?php

namespace App\Http\Controllers\Master;

use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ProductRequest;


class ProductController extends Controller
{
    protected $view = 'master.product.';

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        try {
            return view($this->view.'index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'ProductController@index');
        }
    }
    public function create()
    {
        return view($this->view.'create');
    }
    public function store(ProductRequest $request)
    {
        try {
            $organizationId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            
            if (!$organizationId) {
                return back()->withErrors(['error' => 'No organization found.']);
            }
            
            $data = array_merge($request->validated(), [
                'organization_id' => $organizationId,
            ]);
            
            $product = $this->productService->create($data);
            
            return redirect()->route('master.product.index')
                ->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            return $this->handleException($e, 'ProductController@store');
        }
    }
}
