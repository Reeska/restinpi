<?phpsession_start();/** * constantes */define('ROOT', __DIR__);define('MOD_PATH', 'plugins');define('MOD_DIR', ROOT.'/'.MOD_PATH);define('CONFIG_DIR', ROOT.'/config');define('BASEURL', '/rpi');define('VIEW_ROOT', BASEURL.'/view');define('MOD_ROOT', BASEURL.'/'.MOD_PATH);/** * tools */require_once __DIR__.'/lib/tools/debug.lib.php';require_once __DIR__.'/lib/tools/utils.lib.php';require_once __DIR__.'/lib/tools/net.lib.php';require_once __DIR__.'/lib/ws/ws.lib.php';/** * Bootstraping */require_once __DIR__.'/bootstrap.php';/** * Twig template engine */require_once __DIR__.'/lib/composer/vendor/autoload.php';