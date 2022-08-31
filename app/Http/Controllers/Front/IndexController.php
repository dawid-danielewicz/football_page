<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Payments\PaymentInterface;
use App\Repositories\IndexRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $repository;

    public function __construct(IndexRepository $repository) {
        $this->repository = $repository;
    }

    public function index() {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('index', [
            'articles' => $articles,
            'main_article' => $this->repository->getSlot('main'),
            'first_article' => $this->repository->getSlot('first slot'),
            'second_article' => $this->repository->getSlot('second slot')
        ]);
    }

    public function checkout() {
        return view('checkout');
    }

    public function payment(Request $request, PaymentInterface $payment) {
        $payment->setDiscount($request->input('discount'));
        return $payment->charge($request->input('price'));
    }
}
