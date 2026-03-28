<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class TrackVisitor
{
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $uri = $request->path(); // e.g. en/page/about

        // Detect language
        if (preg_match('/^hi(\/|$)/', $uri)) {
            $language = 'hindi';
        } else {
            $language = 'english';
        }

        // Check if record exists for this IP & language
        $visitor = DB::table('visitors')
            ->where('ip_address', $ip)
            ->where('language', $language)
            ->first();

        if ($visitor) {
            // Increment visit count
            DB::table('visitors')
                ->where('id', $visitor->id)
                ->increment('visit_count');
        } else {
            // Insert new record
            DB::table('visitors')->insert([
                'ip_address'  => $ip,
                'language'    => $language,
                'visit_count' => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }

        return $next($request);
    }
}
