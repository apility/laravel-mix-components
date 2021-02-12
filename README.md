# Laravel Mix Components
An easier way of including laravel mix in your project.

Laravel Mix Components provides components for easily connecting your laravel mix setup to your html.  
Whether you run `build`, `watch`, or `hot`, this will read the manifest and insert the right `<script>` and `<link>`
tags at the appropriate places. 

## Installation
`$ composer require apility/laravel-mix-components`

## Usage
Insert the `<x-mix-head />` and `<x-mix-body />` blade components at the end of your `<head>` and `<body>`. 
```html
<!DOCTYPE html>
<html>
  <head>
    ...
    
    <x-mix-head />
  </head>

  <body>
    ...

    <x-mix-body />
  </body>
</html>
```

## Configuration

### Props

#### `preload`
Preloads asssets.
This prop only applies to `<x-mix-head />`

##### Example
```html
<x-mix-head preload />
```

#### `integrity`
Generates [SRI integrity hashes](https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity) for each asset.
Must be a valid algorithm supportedd by PHP. Most browsers only supports `sha256`, `sha384` and `sha512`.

##### Example
```html
<x-mix-head integrity="sha384" />
<x-mix-body integrity="sha256,sha284" />
```

#### `crossorigin`
Sets the crossorigin CORS attribute. Often required by the browser if the asset is located on a different origin. If SRI is enabled, the crossorigin value must be set, otherwise the browser treats it like the integrity hash is invalid.

##### Example
```html
<x-mix-head crossorigin="anonymous" />
<x-mix-body crossorigin="anonymous" />
```

#### `manifest-directory`
Laravel Mix will by default output the `hot` and `mix-manifest.json` files in the root of `/public`.  
Laravel Mix Components can be configured to read the file in another directory.  
The path segment given will be appended to the base directory `/public`.

This prop must be set on both `<x-mix-head />` and `<x-mix-body />`.
##### Example
```html
<!-- Will look for manifest files in /public/manifests -->
<x-mix-head manifest-directory="/manifests" />
<x-mix-body manifest-directory="/manifests" />

<!-- Will look for manifest files in /manifests -->
<x-mix-head manifest-directory="../manifests" />
<x-mix-body manifest-directory="../manifests" />
```
