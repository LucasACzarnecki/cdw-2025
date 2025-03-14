# Metatags – SEO for Kirby

Metatags provides blueprints, snippets. At the moment the plugin covers:

- Basic Meta Information (Title, Description, Keywords, Canonical URL, etc.) 
- Open Graph
- Twitter Cards
- ~~Robots Settings~~
- Favicon + meta theme color
- App webmanifest

All of the above is neatly organized in a pre-composed SEO tab that can easily be added to any blueprint.

This plugin was originally developed at [diesdas.digital] by Jonathan Muth, Lorenz Seeger and Leslie Büttel.


## Installation

### Download

Download and copy this repository to `/site/plugins/kirby-metatags`.

## Setup

How to add Metatags to Kirby:

1. Add the SEO tab to your site's blueprint (site.yml): `seotab: seo` (Metatags uses the site's meta information as a fallback when no meta information is provided for a page)
2. Add the SEO tab to your pages blueprints: `seotab: seo`
3. Add this the favicon field group `favicon: fields/favicon` to your site blueprint (site.yml).
4. Add the snippet to your head: `<?php snippet('meta_information'); ?>`

Example:

```yaml
title: Site

tabs:
  content:
    label: Content
    fields:
      favicon: fields/favicon
      ...
  seotab: seo
```

## Options

Currently the plugin isn't configurable via the `config.php` file. This is something we are thinking about adding in a future release.

## License

MIT – See LICENSE.md for more info.

## Credits

- [diesdas ⚡️ digital](https://github.com/diesdasdigital)
