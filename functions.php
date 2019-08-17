<?php


if (! function_exists('starts_with')) {
    function starts_with($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle != '' && substr($haystack, 0, strlen($needle)) === (string) $needle) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('mix')) {
    /**
     * Get the path to a versioned Mix file.
     *
     * @param  string  $path
     * @param  string  $manifestDirectory
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    function mix($path, $manifestDirectory = '')
    {
        static $manifests = [];

        if (! starts_with($path, '/')) {
            $path = "/{$path}";
        }

        if (!$manifestDirectory) {
            $manifestDirectory = get_template_directory();
        }

        if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }

        if (file_exists(get_stylesheet_directory() . $manifestDirectory.'/hot')) {
            return new HtmlString("//localhost:8080{$path}");
        }

        $manifestPath = $manifestDirectory . '/mix-manifest.json';

        if (! isset($manifests[$manifestPath])) {
            if (! file_exists($manifestPath)) {
                throw new Exception('The Mix manifest does not exist.');
            }

            $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
        }

        $manifest = $manifests[$manifestPath];

        if (! isset($manifest[$path])) {
            throw new Exception(
                "Unable to locate Mix file: {$path}. Please check your ".
                'webpack.mix.js output paths and try again.'
            );
        }

        return (get_template_directory_uri() . $manifest[$path]);
    }
}

function mix_enqueue_styles() {
    $theme = wp_get_theme();
    wp_enqueue_style(  'styles' , mix('/style.css'), [], null );
}
add_action( 'wp_enqueue_scripts', 'mix_enqueue_styles' );

function mix_enqueue_scripts() {
    wp_enqueue_script( 'scripts' , mix('/js/app.js'), [], null );
}

add_action( 'wp_enqueue_scripts', 'mix_enqueue_scripts' );

function register_main_nav() {
    register_nav_menus( array(
        'primary' => 'Primary Navigation'
    ) );

}

add_action( 'after_setup_theme', 'register_main_nav' );
