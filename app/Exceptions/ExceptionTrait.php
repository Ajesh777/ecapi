<?php

    // 20.0 use App\Exceptions:
        namespace App\Exceptions;

    // 20.1 use Illuminate & Symfony Exception Handler
        use Illuminate\Database\Eloquent\ModelNotFoundException;
        use Symfony\Component\HttpFoundation\Response;
        use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

    // 20.2 Create Exception Trait:
        trait ExceptionTrait
        {
            public function apiException($request, $e)
            {
                if($this->isModel($e)){
                    return $this->ModelResponse($e);
                }

                if($this->isHttp($e)){
                    return $this->HttpResponse($e);
                }

                return parent::render($request, $exception);
            }
            // 20.3 Create ModelNotFoundException:
                protected function isModel($e)
                {
                    return $e instanceof ModelNotFoundException;
                }

            // 20.4 Create NotFoundHttpException:
                protected function isHttp($e)
                {
                    return $e instanceof NotFoundHttpException;
                }
            
            // 20.5 Create ModelResponse:
                protected function ModelResponse($e)
                {
                    return response()->json([
                        'errors' => 'Product not found.'
                    ],Response::HTTP_NOT_FOUND);
                }

            // 20.6 Create ModelResponse:
                protected function HttpResponse($e)
                {
                    return response()->json([
                        'errors' => 'Incorrect Route.'
                    ],Response::HTTP_NOT_FOUND);
                }
        }
?>