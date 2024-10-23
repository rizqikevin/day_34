<?php

require 'vendor/autoload.php';

use Nesk\Puphpeteer\Puppeteer;

$puppeteer = new Puppeteer();
$browser = $puppeteer->launch(['headless' => false]);
$page = $browser->newPage();

try {
    $page->goto('https://farmrpg.com/index.php#!/login', [
        'waitUntil' => 'networkidle0',
    ]);

    $page->waitForSelector('#username');
    $page->type('#username', 'jual122'); 
    $page->type('#password', '@887Jual'); 
    
    $page->click('#submit-button'); 
    

    $page->waitForNavigation(['waitUntil' => 'networkidle0']);

    echo "Login berhasil! Memulai permainan...\n";

    $page->goto('https://farmrpg.com/game');
    echo "Permainan dimulai...\n";

    $page->click('.start-button-selector');

    echo "Permainan telah dimulai...\n";

} catch (\Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
} finally {
    $browser->close();
}
