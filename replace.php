<?php
$directory = new RecursiveDirectoryIterator('.');
$iterator = new RecursiveIteratorIterator($directory);
$files = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

$count = 0;
foreach ($files as $file) {
    $path = $file[0];
    
    // Skip vendor and storage directories
    if (strpos($path, 'vendor') !== false || strpos($path, 'storage') !== false || strpos($path, '.gemini') !== false) {
        continue;
    }
    
    $content = file_get_contents($path);
    $original = $content;
    
    if (strpos($content, '—') !== false) {
        $content = str_replace(' — ', ' - ', $content);
        $content = str_replace('—', '-', $content);
        
        if ($content !== $original) {
            file_put_contents($path, $content);
            echo "Updated: $path\n";
            $count++;
        }
    }
}
echo "Done. Updated $count files.\n";
