import { spawn, spawnSync } from 'node:child_process';
import { existsSync, readdirSync } from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const root = fileURLToPath(new URL('../', import.meta.url));
const port = process.env.PORT || '8000';
if (!/^\d+$/.test(port) || Number(port) < 1 || Number(port) > 65535) {
  console.error('PORT must be a number between 1 and 65535.');
  process.exit(1);
}

const candidates = process.env.PHP_BINARY ? [process.env.PHP_BINARY] : ['php'];
if (!process.env.PHP_BINARY) {
  const laragonPhp = path.join(path.dirname(path.dirname(root)), 'bin', 'php');
  if (existsSync(laragonPhp)) {
    const versions = readdirSync(laragonPhp).sort().reverse();
    // Prefer the PHP 8.3 runtime used by this project's Laragon installation.
    versions.sort((a, b) => Number(b.startsWith('php-8.3.')) - Number(a.startsWith('php-8.3.')));
    candidates.push(...versions.map(version => path.join(laragonPhp, version, 'php.exe')));
  }
}

const php = candidates.find(binary => spawnSync(binary, ['-v'], { stdio: 'ignore' }).status === 0);
if (!php) {
  console.error('PHP was not found. Add PHP to PATH or set PHP_BINARY to the PHP executable path.');
  process.exit(1);
}

console.log(`WordPress dev server: http://127.0.0.1:${port}`);
console.log('Keep MySQL running in Laragon. Press Ctrl+C to stop this server.');
const server = spawn(php, ['-S', `127.0.0.1:${port}`, '-t', root, path.join(root, 'scripts', 'router.php')], {
  cwd: root,
  stdio: 'inherit',
});
server.on('error', error => {
  console.error(`Could not start PHP: ${error.message}`);
  process.exitCode = 1;
});
server.on('exit', code => { process.exitCode = code ?? 0; });
process.on('SIGINT', () => server.kill('SIGINT'));
process.on('SIGTERM', () => server.kill('SIGTERM'));
