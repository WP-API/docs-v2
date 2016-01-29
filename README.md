These files comprise v2.wp-api.org. The endpoint documentation is programmatically, but manually, generated from the API.

## Installation

You should have Ruby and gem installed.

[Install Jekyll](https://help.github.com/articles/using-jekyll-with-pages/#installing-jekyll)

[Install bundler](https://github.com/bundler/bundler/#installation-and-usage)

Install gem dependencies

```bash
bundle install
```

### Setup

Build the endpoint documentation:

```bash
ruby regenerate.rb
```

Run the website locally, and recompile files on change

```bash
bundle exec jekyll serve --watch
```

Open http://0.0.0.0:4000 in your browser to see the site

### Notes

Styles use of [Foundation v 5.5.3](http://foundation.zurb.com/sites/docs/v/5.5.3/)
