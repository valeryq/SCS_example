<?php

/**
 * Catch and handle when throw Exception
 */
App::error(function (Exception $exception, $code) {
    Log::error($exception);
});

/**
 * Catch and handle when throw ValidatorException
 */
App::error(function (ValidatorException $exception, $code) {
    return Response::json($exception->getErrors(), $exception->getCode() ?: 422);
});

/**
 * Catch and handle when throw ModelNotFoundException
 */
App::error(function (ModelNotFoundException $exception, $code) {
    return Response::json(['message' => $exception->getMessage()], $exception->getCode());
});

//App::error(function(Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception, $code)
//{
//    return Response::json(['message' => 'Route not found'], 404);
//});