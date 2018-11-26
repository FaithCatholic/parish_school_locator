## Deployment Instructions for Sacramento Diocese website
1. Disable the page_1 ("Page"; /parishes) and page_2 ("Map page"; /parishes/map) displays in the view parishes

1. Disable the page_1 ("Page"; /schools-list) and page_2 ("Map page"; /schools/map) displays in the view schools

1. Update Geocoder contrib module (`composer update drupal/geocoder`)

1. Update Leaflet contrib module (`composer update drupal/leaflet`)

1. Add Geolocation contrib module to composer (`composer require drupal/geolocation`)

1. Add Views Field View module to composer (`composer require drupal/views_field_view`)

1. Clone the parish_school_locator custom module repo into /web/modules/custom*

1. Enable Geolocation contrib module (`drush en geolocation`)

1. Enable Views Field View contrib module (`drush en views_field_view`)

1. Enable the parish_school_locator custom module (`drush en parish_school_locator`)

1. Rebuild site cache (`drush cr`)

1. Add Mapbox API key to Mapbox admin page (/admin/config/services/mapbox)**

*Until the module is packaged and can simply be added to composer.json

**Mapbox API key is available in Fulcrum at https://fulcrum.brooks.digital/documents/19