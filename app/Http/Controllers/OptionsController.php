<?php

namespace App\Http\Controllers;

use App\Services\OptionService;
use Illuminate\Http\Request;
use Jiannei\Response\Laravel\Support\Facades\Response;

class OptionsController extends Controller
{
    /**
     * @var OptionService
     */
    private $service;

    public function __construct(OptionService $service)
    {
        $this->service = $service;
    }

    public function options(Request $request, $keyword)
    {
        $options = [];
        if (method_exists($this->service, $method = $keyword)) {
            $options = $this->service->$method($request);
        }

        if ($request->get('type') === 'dtree') {
            return \response()->json(['code' => 200, 'data' => $options, "message" => "操作成功"]);
        }

        return Response::success($options);
    }
}
