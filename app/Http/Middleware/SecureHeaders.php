<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class SecureHeaders
{
    // Enumerate headers which you do not want in your application's responses.
    // Great starting point would be to go check out @Scott_Helme's:
    // https://securityheaders.com/
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
        'X-Laravel-Version',
    ];
    public function handle($request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Methods', 'GET,POST');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        $response->headers->set('Content-Security-Policy', 'upgrade-insecure-requests;');
        $response->headers->set('Cross-Origin-Embedder-Policy', "unsafe-none; report-to='default'");
        $response->headers->set('Cross-Origin-Embedder-Policy-Report-Only', "unsafe-none; report-to='default'");
        $response->headers->set('Cross-Origin-Opener-Policy', "unsafe-none");
        $response->headers->set('Cross-Origin-Opener-Policy-Report-Only', "unsafe-none; report-to='default'");
        $response->headers->set('Cross-Origin-Resource-Policy', "cross-origin");
        $response->headers->set('Permissions-Policy', "accelerometer=(), autoplay=(), interest-cohort=(), camera=(), cross-origin-isolated=(), display-capture=(self), encrypted-media=(), fullscreen=*, geolocation=(self), gyroscope=(), keyboard-map=(), magnetometer=(), microphone=(), midi=(), payment=*, picture-in-picture=(), publickey-credentials-get=(), screen-wake-lock=(), sync-xhr=(), usb=(), xr-spatial-tracking=(), gamepad=(), serial=(), window-placement=()");
        $response->headers->set('Referrer-Policy', "strict-origin-when-cross-origin");
        $response->headers->set('Strict-Transport-Security', "max-age=63072000");
        $response->headers->set('X-Content-Security-Policy', "default-src 'self'; img-src *; media-src * data:;");
        $response->headers->set('X-Content-Type-Options', "nosniff");
        $response->headers->set('X-Frame-Options', "SAMEORIGIN");
        $response->headers->set('X-XSS-Protection', "1; mode=block");
        $response->headers->set('X-Permitted-Cross-Domain-Policies', "none");// Clearly, you will be more elaborate here.
        return $response;
    }
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }
}
?>