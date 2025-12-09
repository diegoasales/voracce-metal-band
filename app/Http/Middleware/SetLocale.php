<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     * Detects user's preferred language from Accept-Language header
     * and sets the appropriate locale (pt, de, es, fr, or en).
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $this->detectLocale($request);
        App::setLocale($locale);
        
        return $next($request);
    }

    /**
     * Detect locale from Accept-Language header
     * Supported locales: pt (Portuguese), de (German), es (Spanish), fr (French)
     * Default: en (English)
     */
    private function detectLocale(Request $request): string
    {
        // Get Accept-Language header
        $acceptLanguage = $request->header('Accept-Language');
        
        if (!$acceptLanguage) {
            return config('app.locale', 'en');
        }

        // Parse Accept-Language header
        // Format: "pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7"
        $languages = [];
        $parts = explode(',', $acceptLanguage);
        
        foreach ($parts as $part) {
            $part = trim($part);
            if (strpos($part, ';') !== false) {
                [$lang, $q] = explode(';', $part);
                $q = (float) str_replace('q=', '', $q);
            } else {
                $lang = $part;
                $q = 1.0;
            }
            
            $lang = trim($lang);
            $languages[$lang] = $q;
        }
        
        // Sort by quality (q value)
        arsort($languages);
        
        // Supported locales mapping
        $supportedLocales = [
            'pt' => 'pt', // Portuguese (pt, pt-BR, pt-PT, etc.)
            'de' => 'de', // German (de, de-DE, de-AT, de-CH, etc.)
            'es' => 'es', // Spanish (es, es-ES, es-MX, es-AR, etc.)
            'fr' => 'fr', // French (fr, fr-FR, fr-CA, fr-BE, etc.)
        ];
        
        // Check for supported locales
        foreach (array_keys($languages) as $lang) {
            // Extract base language (pt-BR -> pt)
            $baseLang = strtolower(substr($lang, 0, 2));
            
            if (isset($supportedLocales[$baseLang])) {
                return $supportedLocales[$baseLang];
            }
        }
        
        // Default to English
        return 'en';
    }
}
