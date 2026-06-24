<?php
$files = [
    'resources/views/frontend/layouts/style.blade.php',
    'resources/views/frontend/layouts/scripts.blade.php',
    'resources/views/frontend/layouts/header.blade.php',
    'resources/views/frontend/layouts/footer.blade.php',
    'resources/views/frontend/home.blade.php',
];

$patterns = [
    '/href="js\/([^"]*)"/' => 'href="{{ asset(\'frontend/js/$1\') }}"',
    '/src="js\/([^"]*)"/' => 'src="{{ asset(\'frontend/js/$1\') }}"',
];

foreach ($files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        foreach ($patterns as $pattern => $replacement) {
            $content = preg_replace($pattern, $replacement, $content);
        }
        file_put_contents($file, $content);
        echo "Fixed $file\n";
    }
}
echo "Asset paths updated.\n";
