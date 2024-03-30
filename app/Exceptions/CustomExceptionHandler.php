<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;


class CustomExceptionHandler extends ExceptionHandler
{
    // ... (existing code)

    public function render($request, Throwable $exception)
    {
        // Redirect to home page for specific exceptions (you can customize this)
        if ($this->isDeveloperError($exception)) {
            return redirect()->route('error');
        }

        return parent::render($request, $exception);
    }

    // Example function to check if it's a developer error
    protected function isDeveloperError(Throwable $exception)
    {
        // You can customize this condition based on the exception type or any other criteria
        return app()->environment('local') && $exception instanceof \ErrorException;
    }
}
