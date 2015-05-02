These files comprise v2.wp-api.org. The endpoint documentation is programmatically, but manually, generated from the API.

### Setup

1. Install [Composer](http://getcomposer.org/).

2. Install dev dependencies with `composer install --dev`

3. Set the domain for WP-API: `export WP_API_DEV_DOMAIN=http://wordpress-develop.dev` (or similar)

4. Build the endpoint documentation:

```bash
vendor/bin/phake
```
