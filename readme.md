# Routing is incompatible with embedded PHP server and default nginx settings #1829

Issue: https://github.com/slimphp/Slim/issues/1829

## Steps to reproduce

```bash
cd public
php -S 0.0.0.0:8888 api.php
```

and open [http://localhost:8888/hello](http://localhost:8888/hello).

### Result

Browser displays 404.

### Expected

Browser displays `var_dump` of environment.

## Workarounds

### Rename `api.php`

```bash
mv public/api.php public/index.php
```

### Fix `_SERVER`

Uncomment `$_SERVER['SCRIPT_NAME'] = '/api.php';` in `public/api.php`


## Explanation

As already mentioned at https://github.com/slimphp/Slim/issues/1829#issuecomment-220913048:

The built-in web server stupidly modifies `'SCRIPT_NAME'` to ` 'SCRIPT_NAME' => '/hello'`, which in turn breaks the [`$basePath` determination](https://github.com/slimphp/Slim/blob/3.4.1/Slim/Http/Uri.php#L200).

## License

MIT © [Michael Mayer](http://schnittstabil.de)
